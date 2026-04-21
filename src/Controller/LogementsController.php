<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LogementsController extends AbstractController
{
    #[Route('/logements', name: 'app_logements')]
    public function index(): Response
    {
        return $this->render('logements/index.html.twig');
    }
}
