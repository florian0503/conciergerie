<?php

namespace App\Controller;

use App\Repository\LogementRepository;
use App\Repository\QuartierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

final class LogementsController extends AbstractController
{
    #[Route('/logements', name: 'app_logements')]
    public function index(LogementRepository $repo, QuartierRepository $quartierRepo): Response
    {
        return $this->render('logements/index.html.twig', [
            'logements' => $repo->findBy(['publie' => true]),
            'quartiers' => $quartierRepo->findBy(['publie' => true], ['position' => 'ASC']),
        ]);
    }

    #[Route('/logements/{slug}', name: 'app_logement_show')]
    public function show(string $slug, LogementRepository $repo): Response
    {
        $logement = $repo->findOneBy(['slug' => $slug, 'publie' => true]);

        if (!$logement) {
            throw new NotFoundHttpException('Logement introuvable.');
        }

        $autres = $repo->findOthers($slug);

        return $this->render('logements/show.html.twig', [
            'logement' => $logement,
            'autres'   => $autres,
        ]);
    }
}
