<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\LogementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    #[Route('/sitemap.xml', name: 'app_sitemap', defaults: ['_format' => 'xml'])]
    public function index(ArticleRepository $articleRepository, LogementRepository $logementRepository): Response
    {
        $logements = $logementRepository->findBy(['publie' => true]);
        $articles  = $articleRepository->findBy(['publie' => true]);

        $response = $this->render('sitemap/index.xml.twig', [
            'logements' => $logements,
            'articles'  => $articles,
        ]);

        $response->headers->set('Content-Type', 'application/xml');

        return $response;
    }
}
