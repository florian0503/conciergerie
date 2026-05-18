<?php

namespace App\Controller\Admin;

use App\Entity\AvisStats;
use App\Repository\AvisStatsRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class AvisStatsCrudController extends AbstractCrudController
{
    public function __construct(
        private AvisStatsRepository $repo,
        private AdminUrlGenerator $adminUrlGenerator,
    ) {}

    public static function getEntityFqcn(): string
    {
        return AvisStats::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Statistiques avis')
            ->setEntityLabelInPlural('Statistiques avis')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier les statistiques');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE, Action::INDEX);
    }

    public function configureFields(string $pageName): iterable
    {
        yield NumberField::new('note', 'Note moyenne ★')
            ->setNumDecimals(2)
            ->setHelp('Ex: 4.94');
        yield IntegerField::new('proprietairesSatisfaits', 'Propriétaires satisfaits (%)')
            ->setHelp('Ex: 98');
        yield IntegerField::new('avisTotal', 'Avis cumulés')
            ->setHelp('Ex: 340');
        yield IntegerField::new('recommandent', 'Recommanderaient (%)')
            ->setHelp('Ex: 93');
    }

    public function index(mixed $context = null): Response
    {
        $stats = $this->repo->getOrCreate();

        $url = $this->adminUrlGenerator
            ->setController(self::class)
            ->setAction(Action::EDIT)
            ->setEntityId($stats->getId())
            ->generateUrl();

        return new RedirectResponse($url);
    }
}
