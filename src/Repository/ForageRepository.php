<?php

namespace App\Repository;

use App\Entity\Forage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Forage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Forage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Forage[]    findAll()
 * @method Forage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Forage::class);
    }

//    /**
//     * @return Forage[] Returns an array of Forage objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Forage
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
