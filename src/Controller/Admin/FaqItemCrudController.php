<?php

namespace App\Controller\Admin;

use App\Entity\FaqItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FaqItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FaqItem::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield ChoiceField::new('categorie')->setChoices([
            'Général' => 'general',
            'Tarifs' => 'tarifs',
            'Ménage' => 'menage',
            'Contrat' => 'contrat',
        ]);
        yield TextField::new('question');
        yield TextareaField::new('reponse', 'Réponse')->hideOnIndex();
        yield IntegerField::new('position', 'Ordre');
        yield BooleanField::new('publie');
    }
}
