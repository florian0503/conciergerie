<?php

namespace App\Controller;

use App\Repository\AvisRepository;
use App\Repository\AvisStatsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis')]
    public function index(AvisRepository $repo, AvisStatsRepository $statsRepo): Response
    {
        return $this->render('avis/index.html.twig', [
            'avis'  => $repo->findBy(['publie' => true], ['position' => 'ASC']),
            'stats' => $statsRepo->getOrCreate(),
        ]);
    }
}
