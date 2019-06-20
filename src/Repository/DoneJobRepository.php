<?php

namespace App\Repository;

use App\Entity\DoneJob;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DoneJob|null find($id, $lockMode = null, $lockVersion = null)
 * @method DoneJob|null findOneBy(array $criteria, array $orderBy = null)
 * @method DoneJob[]    findAll()
 * @method DoneJob[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoneJobRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DoneJob::class);
    }

    // /**
    //  * @return DoneJob[] Returns an array of DoneJob objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DoneJob
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
