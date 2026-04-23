<?php

namespace App\Controller\Admin;

use App\Entity\Avis;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AvisCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Avis::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        yield TextField::new('role', 'Rôle (ex: Propriétaire, Presqu\'île)');
        yield TextareaField::new('texte')->hideOnIndex();
        yield ChoiceField::new('note')->setChoices([
            '5 étoiles' => 5,
            '4 étoiles' => 4,
            '3 étoiles' => 3,
        ]);
        yield BooleanField::new('proprietaire', 'Avis propriétaire');
        yield IntegerField::new('position', 'Ordre');
        yield BooleanField::new('publie');
    }
}
