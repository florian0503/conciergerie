<?php

namespace App\Controller\Admin;

use App\Entity\Logement;
use App\Field\PhotosField;
use App\Repository\QuartierRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\String\Slugger\SluggerInterface;

class LogementCrudController extends AbstractCrudController
{
    public function __construct(
        private QuartierRepository $quartierRepo,
        private SluggerInterface $slugger,
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return Logement::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setFormThemes(['admin/form/photos_theme.html.twig', '@EasyAdmin/crud/form_theme.html.twig'])
            ->setEntityLabelInSingular('Logement')
            ->setEntityLabelInPlural('Logements');
    }

    public function configureFields(string $pageName): iterable
    {
        $choices = [];
        foreach ($this->quartierRepo->findBy(['publie' => true], ['position' => 'ASC']) as $q) {
            $choices[$q->getNom()] = $q->getNom();
        }

        $typeChoices = [
            'Appartement' => 'Appartement',
            'Studio'      => 'Studio',
            'Loft'        => 'Loft',
            'Maison'      => 'Maison',
            'Duplex'      => 'Duplex',
            'Villa'       => 'Villa',
        ];

        // ── Vue liste ──────────────────────────────────────────────
        if ($pageName === Crud::PAGE_INDEX) {
            yield TextField::new('nom', 'Nom');
            yield TextField::new('quartier', 'Quartier');
            yield TextField::new('type', 'Type');
            yield IntegerField::new('voyageurs', 'Voyageurs');
            yield NumberField::new('note', 'Note')->setNumDecimals(2);
            yield BooleanField::new('publie', 'Publié');

            return;
        }

        // ── Formulaire (new / edit) ────────────────────────────────
        yield FormField::addFieldset('Informations générales');
        yield TextField::new('nom', 'Nom du logement');
        yield SlugField::new('slug', 'Slug (URL)')
            ->setTargetFieldName('nom')
            ->setHelp('Généré automatiquement depuis le nom.')
            ->onlyOnForms()
            ->setFormTypeOption('required', false);
        yield ChoiceField::new('type', 'Type de bien')
            ->setChoices($typeChoices)
            ->renderAsNativeWidget();
        yield ChoiceField::new('quartier', 'Quartier')
            ->setChoices($choices)
            ->renderAsNativeWidget();
        yield BooleanField::new('publie', 'Publié sur le site');

        yield FormField::addFieldset('Capacité & chiffres');
        yield IntegerField::new('voyageurs', 'Nb de voyageurs');
        yield IntegerField::new('chambres', 'Nb de chambres');
        yield NumberField::new('note', 'Note (ex: 4.92)')->setNumDecimals(2);
        yield IntegerField::new('avis', 'Nb d\'avis');
        yield IntegerField::new('occupation', 'Taux d\'occupation (%)');
        yield TextField::new('revenus', 'Revenus estimés / mois (ex: 2 400 €)');

        yield FormField::addFieldset('Photos');
        yield PhotosField::new('photos', 'Photos du logement');

        yield FormField::addFieldset('Description & équipements');

        yield TextareaField::new('description', 'Description');
        yield ArrayField::new('equipements', 'Équipements')
            ->setHelp('Appuyez sur Entrée après chaque équipement. Ex : Wifi, Parking, Climatisation…');
        yield ArrayField::new('pointsInteret', 'Points d\'intérêt')
            ->setHelp('Appuyez sur Entrée après chaque point. Ex : 5 min du métro, Vue sur Saône…');
    }

    public function persistEntity(EntityManagerInterface $em, $entity): void
    {
        $this->ensureSlug($entity);
        parent::persistEntity($em, $entity);
    }

    public function updateEntity(EntityManagerInterface $em, $entity): void
    {
        $this->ensureSlug($entity);
        parent::updateEntity($em, $entity);
    }

    private function ensureSlug(Logement $logement): void
    {
        if (empty($logement->getSlug()) && $logement->getNom()) {
            $logement->setSlug($this->slugger->slug($logement->getNom())->lower()->toString());
        }
    }
}
