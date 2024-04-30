<?php

namespace App\Repository;

use App\Entity\PotionIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PotionIngredient>
 *
 * @method PotionIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method PotionIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method PotionIngredient[]    findAll()
 * @method PotionIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PotionIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PotionIngredient::class);
    }

    //    /**
    //     * @return PotionIngredient[] Returns an array of PotionIngredient objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?PotionIngredient
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
