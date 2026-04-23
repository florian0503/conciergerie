<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /** @return Article[] */
    public function findRelated(string $slug, int $limit = 3): array
    {
        return $this->createQueryBuilder('a')
            ->where('a.slug != :slug')
            ->andWhere('a.publie = true')
            ->setParameter('slug', $slug)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
