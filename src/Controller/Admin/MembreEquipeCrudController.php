<?php

namespace App\Controller\Admin;

use App\Entity\MembreEquipe;
use App\Field\SinglePhotoField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MembreEquipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MembreEquipe::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setFormThemes(['admin/form/photos_theme.html.twig', '@EasyAdmin/crud/form_theme.html.twig']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        yield TextField::new('role', 'Rôle');
        yield TextareaField::new('bio')->hideOnIndex();
        yield ArrayField::new('tags', 'Tags (ex: Lyon 2e, 5 ans)')->hideOnIndex();
        yield SinglePhotoField::new('photoSlug', 'Photo')->hideOnIndex();
        yield IntegerField::new('position', 'Ordre');
        yield BooleanField::new('publie');
    }
}
