<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Field\SinglePhotoField;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\String\Slugger\SluggerInterface;

class ArticleCrudController extends AbstractCrudController
{
    public function __construct(private SluggerInterface $slugger)
    {
    }

    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setFormThemes(['admin/form/photos_theme.html.twig', '@EasyAdmin/crud/form_theme.html.twig']);
    }

    public function configureFields(string $pageName): iterable
    {
        if ($pageName === Crud::PAGE_INDEX) {
            yield TextField::new('title', 'Titre');
            yield TextField::new('tag', 'Tag');
            yield TextField::new('author', 'Auteur');
            yield TextField::new('date', 'Date');
            yield BooleanField::new('publie', 'Publié');

            return;
        }

        yield FormField::addFieldset('Informations');
        yield TextField::new('title', 'Titre');
        yield SlugField::new('slug')->setTargetFieldName('title')
            ->setFormTypeOption('required', false)
            ->setHelp('Généré automatiquement depuis le titre.');
        yield TextField::new('tag', 'Tag (ex: Conseils, Actualités)');
        yield TextField::new('author', 'Auteur');
        yield TextField::new('date', 'Date (ex: 12 avril 2026)');
        yield TextField::new('readTime', 'Temps de lecture (ex: 5 min)')
            ->setFormTypeOption('required', false);
        yield BooleanField::new('publie', 'Publié');

        yield FormField::addFieldset('Image de couverture');
        yield SinglePhotoField::new('img', 'Image');

        yield FormField::addFieldset('Contenu de l\'article');
        yield TextareaField::new('excerpt', 'Résumé / Introduction')
            ->setHelp('Court texte affiché dans la liste des articles.')
            ->setNumOfRows(3);
        yield TextareaField::new('contentRaw', 'Texte de l\'article')
            ->setVirtual(true)
            ->setHelp('Séparez les paragraphes par une ligne vide. Préfixez une ligne avec "## " pour un titre de section.')
            ->setNumOfRows(15)
            ->setFormTypeOption('mapped', false)
            ->setFormTypeOption('required', false);
    }

    public function persistEntity(EntityManagerInterface $em, $entity): void
    {
        $this->ensureSlug($entity);
        $this->convertContent($entity);
        parent::persistEntity($em, $entity);
    }

    public function updateEntity(EntityManagerInterface $em, $entity): void
    {
        $this->ensureSlug($entity);
        $this->convertContent($entity);
        parent::updateEntity($em, $entity);
    }

    private function ensureSlug(Article $article): void
    {
        if (empty($article->getSlug()) && $article->getTitle()) {
            $article->setSlug($this->slugger->slug($article->getTitle())->lower()->toString());
        }
    }

    private function convertContent(Article $article): void
    {
        $request = $this->container->get('request_stack')->getCurrentRequest();
        $raw = $request->request->all()['Article']['contentRaw'] ?? null;

        if ($raw === null) {
            return;
        }

        // Convertir le texte brut en blocs JSON
        $blocks = [];
        $paragraphs = preg_split('/\n{2,}/', trim($raw));
        $isFirst = true;

        foreach ($paragraphs as $para) {
            $para = trim($para);
            if ($para === '') {
                continue;
            }

            if (str_starts_with($para, '## ')) {
                $blocks[] = ['type' => 'h2', 'text' => substr($para, 3)];
            } elseif ($isFirst) {
                $blocks[] = ['type' => 'lead', 'text' => $para];
                $isFirst = false;
            } else {
                $blocks[] = ['type' => 'p', 'text' => $para];
            }
        }

        $article->setContent($blocks);
    }
}
