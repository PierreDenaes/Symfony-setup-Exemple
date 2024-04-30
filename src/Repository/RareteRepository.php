<?php

namespace App\Repository;

use App\Entity\Rarete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Rarete>
 *
 * @method Rarete|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rarete|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rarete[]    findAll()
 * @method Rarete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RareteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rarete::class);
    }

    //    /**
    //     * @return Rarete[] Returns an array of Rarete objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Rarete
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
