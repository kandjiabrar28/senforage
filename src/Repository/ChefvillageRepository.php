<?php

namespace App\Repository;

use App\Entity\Chefvillage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Chefvillage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chefvillage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chefvillage[]    findAll()
 * @method Chefvillage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChefvillageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Chefvillage::class);
    }

//    /**
//     * @return Chefvillage[] Returns an array of Chefvillage objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Chefvillage
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
