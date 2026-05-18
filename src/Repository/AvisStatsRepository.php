<?php

namespace App\Repository;

use App\Entity\AvisStats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AvisStatsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvisStats::class);
    }

    public function getOrCreate(): AvisStats
    {
        $stats = $this->findOneBy([]);
        if (!$stats) {
            $stats = new AvisStats();
            $this->getEntityManager()->persist($stats);
            $this->getEntityManager()->flush();
        }

        return $stats;
    }
}
