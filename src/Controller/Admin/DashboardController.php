<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AvisStatsCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Les Clés Lyonnaises — Admin')
            ->setFaviconPath('favicon.ico');
    }

    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('styles/admin-dashboard.css');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::section('Contenu');
        yield MenuItem::linkTo(LogementCrudController::class, 'Logements', 'fa fa-building')->setAction('index');
        yield MenuItem::linkTo(ArticleCrudController::class, 'Blog', 'fa fa-newspaper')->setAction('index');
        yield MenuItem::linkTo(FaqItemCrudController::class, 'FAQ', 'fa fa-question-circle')->setAction('index');
        yield MenuItem::linkTo(AvisCrudController::class, 'Avis', 'fa fa-star')->setAction('index');
        yield MenuItem::linkTo(AvisStatsCrudController::class, 'Stats avis', 'fa fa-chart-bar')->setAction('index');
        yield MenuItem::linkTo(MembreEquipeCrudController::class, 'Équipe', 'fa fa-users')->setAction('index');
        yield MenuItem::linkTo(QuartierCrudController::class, 'Quartiers', 'fa fa-map-marker-alt')->setAction('index');
        yield MenuItem::section('Administration');
        yield MenuItem::linkTo(UserCrudController::class, 'Utilisateurs', 'fa fa-user')->setAction('index');
        yield MenuItem::section();
        yield MenuItem::linkToUrl('Voir le site', 'fa fa-arrow-up-right-from-square', '/')->setLinkTarget('_blank');
    }
}
