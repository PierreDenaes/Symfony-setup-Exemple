<?php

namespace App\Repository;

use App\Entity\TypeIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeIngredient>
 *
 * @method TypeIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeIngredient[]    findAll()
 * @method TypeIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeIngredient::class);
    }

    //    /**
    //     * @return TypeIngredient[] Returns an array of TypeIngredient objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?TypeIngredient
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
