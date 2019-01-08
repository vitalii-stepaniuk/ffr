<?php

namespace App\Repository;

use App\Entity\TypeOfIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeOfIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeOfIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeOfIngredient[]    findAll()
 * @method TypeOfIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeOfIngredientRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeOfIngredient::class);
    }

    // /**
    //  * @return TypeOfIngredient[] Returns an array of TypeOfIngredient objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeOfIngredient
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
