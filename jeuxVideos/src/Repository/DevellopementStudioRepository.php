<?php

namespace App\Repository;

use App\Entity\DevellopementStudio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DevellopementStudio|null find($id, $lockMode = null, $lockVersion = null)
 * @method DevellopementStudio|null findOneBy(array $criteria, array $orderBy = null)
 * @method DevellopementStudio[]    findAll()
 * @method DevellopementStudio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DevellopementStudioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DevellopementStudio::class);
    }

    // /**
    //  * @return DevellopementStudio[] Returns an array of DevellopementStudio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DevellopementStudio
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
