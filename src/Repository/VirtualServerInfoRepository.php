<?php

namespace App\Repository;

use App\Entity\VirtualServerInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VirtualServerInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method VirtualServerInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method VirtualServerInfo[]    findAll()
 * @method VirtualServerInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VirtualServerInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VirtualServerInfo::class);
    }

    // /**
    //  * @return VirtualServerInfo[] Returns an array of VirtualServerInfo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VirtualServerInfo
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
