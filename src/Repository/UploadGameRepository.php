<?php

namespace App\Repository;

use App\Entity\UploadGame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UploadGame|null find($id, $lockMode = null, $lockVersion = null)
 * @method UploadGame|null findOneBy(array $criteria, array $orderBy = null)
 * @method UploadGame[]    findAll()
 * @method UploadGame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadGameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UploadGame::class);
    }

    // /**
    //  * @return UploadGame[] Returns an array of UploadGame objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UploadGame
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
