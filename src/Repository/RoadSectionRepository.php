<?php

namespace App\Repository;

use App\Entity\RoadSection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RoadSection|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoadSection|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoadSection[]    findAll()
 * @method RoadSection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoadSectionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RoadSection::class);
    }

    // /**
    //  * @return RoadSection[] Returns an array of RoadSection objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RoadSection
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
