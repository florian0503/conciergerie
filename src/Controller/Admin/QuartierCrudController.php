<?php

namespace App\Controller\Admin;

use App\Entity\Quartier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class QuartierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Quartier::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom', 'Nom affiché (ex: Presqu\'île)');
        yield SlugField::new('slug')->setTargetFieldName('nom')
            ->setHelp('Identifiant unique utilisé pour le filtre (ex: presquile). Doit correspondre au champ Quartier des logements.');
        yield IntegerField::new('position', 'Ordre');
        yield BooleanField::new('publie');
    }
}
