<?php

namespace App\Repository;

use App\Entity\Politicien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Politicien>
 */
class PoliticienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Politicien::class);
    }

    public function findDailyRandom(): ?Politicien
    {
        $ids = $this->createQueryBuilder('p')
            ->select('p.id')
            ->getQuery()
            ->getScalarResult();

        if (!$ids) {
            return null;
        }

        $seed = (int) date('Ymd');
        mt_srand($seed);
        $index = mt_rand(0, count($ids) - 1);
        mt_srand();

        return $this->find($ids[$index]['id']);
    }

    /**
     * @return Politicien[]
     */
    public function searchByName(string $query): array
    {
        return $this->createQueryBuilder('p')
            ->where('LOWER(p.nom) LIKE LOWER(:query)')
            ->setParameter('query', '%' . $query . '%')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
}
