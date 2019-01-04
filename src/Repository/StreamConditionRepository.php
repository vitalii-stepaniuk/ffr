<?php

namespace App\Repository;

use App\Entity\StreamCondition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StreamCondition|null find($id, $lockMode = null, $lockVersion = null)
 * @method StreamCondition|null findOneBy(array $criteria, array $orderBy = null)
 * @method StreamCondition[]    findAll()
 * @method StreamCondition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StreamConditionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StreamCondition::class);
    }

    // /**
    //  * @return StreamCondition[] Returns an array of StreamCondition objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StreamCondition
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
