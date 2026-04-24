<?php

namespace App\Controller;

use App\Repository\AvisRepository;
use App\Repository\QuartierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(QuartierRepository $quartierRepo, AvisRepository $avisRepo): Response
    {
        return $this->render('home/index.html.twig', [
            'quartiers' => $quartierRepo->findBy(['publie' => true], ['position' => 'ASC']),
            'avis'      => $avisRepo->findBy(['publie' => true], ['position' => 'ASC']),
        ]);
    }
}
