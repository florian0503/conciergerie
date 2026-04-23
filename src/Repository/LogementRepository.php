<?php

namespace App\Repository;

use App\Entity\Logement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Logement>
 */
class LogementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Logement::class);
    }

    /** @return Logement[] */
    public function findOthers(string $slug, int $limit = 3): array
    {
        return $this->createQueryBuilder('l')
            ->where('l.slug != :slug')
            ->andWhere('l.publie = true')
            ->setParameter('slug', $slug)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
