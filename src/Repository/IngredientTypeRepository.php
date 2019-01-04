<?php

namespace App\Repository;

use App\Entity\IngredientType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method IngredientType|null find($id, $lockMode = null, $lockVersion = null)
 * @method IngredientType|null findOneBy(array $criteria, array $orderBy = null)
 * @method IngredientType[]    findAll()
 * @method IngredientType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IngredientTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, IngredientType::class);
    }

    // /**
    //  * @return IngredientType[] Returns an array of IngredientType objects
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
    public function findOneBySomeField($value): ?IngredientType
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
