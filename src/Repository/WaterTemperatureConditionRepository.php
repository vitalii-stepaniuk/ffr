<?php

namespace App\Repository;

use App\Entity\WaterTemperatureCondition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WaterTemperatureCondition|null find($id, $lockMode = null, $lockVersion = null)
 * @method WaterTemperatureCondition|null findOneBy(array $criteria, array $orderBy = null)
 * @method WaterTemperatureCondition[]    findAll()
 * @method WaterTemperatureCondition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WaterTemperatureConditionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WaterTemperatureCondition::class);
    }

    // /**
    //  * @return WaterTemperatureCondition[] Returns an array of WaterTemperatureCondition objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WaterTemperatureCondition
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
