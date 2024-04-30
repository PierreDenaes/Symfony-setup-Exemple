<?php

namespace App\Repository;

use App\Entity\EtapePreparation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtapePreparation>
 *
 * @method EtapePreparation|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtapePreparation|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtapePreparation[]    findAll()
 * @method EtapePreparation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtapePreparationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtapePreparation::class);
    }

    //    /**
    //     * @return EtapePreparation[] Returns an array of EtapePreparation objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?EtapePreparation
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
