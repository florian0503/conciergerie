<?php

namespace App\Controller\Admin;

use App\Entity\Logement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LogementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Logement::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        yield SlugField::new('slug')->setTargetFieldName('nom');
        yield TextField::new('type');
        yield TextField::new('quartier');
        yield IntegerField::new('voyageurs');
        yield IntegerField::new('chambres');
        yield NumberField::new('note')->setNumDecimals(2);
        yield IntegerField::new('avis', 'Nb avis');
        yield IntegerField::new('occupation', 'Occupation (%)');
        yield TextField::new('revenus', 'Revenus/mois (€)');
        yield IntegerField::new('imgIndex', 'Index image')->hideOnIndex();
        yield ArrayField::new('photos')->hideOnIndex();
        yield TextareaField::new('description')->hideOnIndex();
        yield ArrayField::new('equipements')->hideOnIndex();
        yield ArrayField::new('pointsInteret', 'Points d\'intérêt')->hideOnIndex();
        yield BooleanField::new('publie');
    }
}
