<?php

namespace App\Repository;

use App\Entity\AdminStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdminStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdminStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdminStatus[]    findAll()
 * @method AdminStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdminStatus::class);
    }

    // /**
    //  * @return AdminStatus[] Returns an array of AdminStatus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdminStatus
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
