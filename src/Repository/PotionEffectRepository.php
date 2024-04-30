<?php

namespace App\Repository;

use App\Entity\PotionEffect;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PotionEffect>
 *
 * @method PotionEffect|null find($id, $lockMode = null, $lockVersion = null)
 * @method PotionEffect|null findOneBy(array $criteria, array $orderBy = null)
 * @method PotionEffect[]    findAll()
 * @method PotionEffect[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PotionEffectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PotionEffect::class);
    }

    //    /**
    //     * @return PotionEffect[] Returns an array of PotionEffect objects
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

    //    public function findOneBySomeField($value): ?PotionEffect
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
