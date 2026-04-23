<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

final class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(ArticleRepository $repo): Response
    {
        $articles = $repo->findBy(['publie' => true]);

        return $this->render('blog/index.html.twig', [
            'articles' => $articles,
            'featured' => $articles[0] ?? null,
        ]);
    }

    #[Route('/blog/{slug}', name: 'app_blog_article')]
    public function article(string $slug, ArticleRepository $repo): Response
    {
        $article = $repo->findOneBy(['slug' => $slug, 'publie' => true]);

        if (!$article) {
            throw new NotFoundHttpException('Article introuvable.');
        }

        $related = $repo->findRelated($slug);

        return $this->render('blog/article.html.twig', [
            'article' => $article,
            'related' => $related,
        ]);
    }
}
