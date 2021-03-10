<?php

namespace App\Repository;

use App\Entity\IncentiveManagingPartner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IncentiveManagingPartner|null find($id, $lockMode = null, $lockVersion = null)
 * @method IncentiveManagingPartner|null findOneBy(array $criteria, array $orderBy = null)
 * @method IncentiveManagingPartner[]    findAll()
 * @method IncentiveManagingPartner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IncentiveManagingPartnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IncentiveManagingPartner::class);
    }

    // /**
    //  * @return IncentiveManagingPartner[] Returns an array of IncentiveManagingPartner objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IncentiveManagingPartner
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
