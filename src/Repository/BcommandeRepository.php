<?php

namespace App\Repository;

use App\Entity\Bcommande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Bcommande|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bcommande|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bcommande[]    findAll()
 * @method Bcommande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BcommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bcommande::class);
    }

    // /**
    //  * @return Bcommande[] Returns an array of Bcommande objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bcommande
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
