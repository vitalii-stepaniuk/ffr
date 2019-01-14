<?php

namespace App\Repository;

use App\Entity\RecipeItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RecipeItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipeItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipeItem[]    findAll()
 * @method RecipeItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeItemRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RecipeItem::class);
    }

    // /**
    //  * @return RecipeItem[] Returns an array of RecipeItem objects
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
    public function findOneBySomeField($value): ?RecipeItem
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
