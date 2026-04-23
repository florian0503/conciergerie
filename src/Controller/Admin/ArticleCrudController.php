<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title', 'Titre');
        yield SlugField::new('slug')->setTargetFieldName('title');
        yield TextField::new('tag');
        yield TextField::new('author', 'Auteur');
        yield TextField::new('date', 'Date (ex: 12 avril 2026)');
        yield TextField::new('readTime', 'Temps de lecture');
        yield TextField::new('img', 'URL image')->hideOnIndex();
        yield TextareaField::new('excerpt', 'Extrait')->hideOnIndex();
        yield ArrayField::new('content', 'Contenu (JSON)')->hideOnIndex();
        yield BooleanField::new('publie');
    }
}
