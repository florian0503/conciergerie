<?php

namespace App\Controller\Admin;

use App\Entity\Quartier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class QuartierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Quartier::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom', 'Quartier / Ville');
        yield IntegerField::new('position', 'Ordre');
        yield BooleanField::new('publie');
    }
}
