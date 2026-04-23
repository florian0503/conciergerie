<?php

namespace App\Controller;

use App\Repository\FaqItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FaqController extends AbstractController
{
    #[Route('/faq', name: 'app_faq')]
    public function index(FaqItemRepository $repo): Response
    {
        $items = $repo->findBy(['publie' => true], ['categorie' => 'ASC', 'position' => 'ASC']);

        $categories = [];
        foreach ($items as $item) {
            $categories[$item->getCategorie()][] = $item;
        }

        return $this->render('faq/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
