<?php

namespace App\Controller;

use App\Repository\MembreEquipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EquipeController extends AbstractController
{
    #[Route('/equipe', name: 'app_equipe')]
    public function index(MembreEquipeRepository $repo): Response
    {
        $membres = $repo->findBy(['publie' => true], ['position' => 'ASC']);

        return $this->render('equipe/index.html.twig', [
            'membres' => $membres,
        ]);
    }
}
