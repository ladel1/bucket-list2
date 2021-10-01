<?php

namespace App\Repository;

use App\Entity\Wish;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Wish|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wish|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wish[]    findAll()
 * @method Wish[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WishRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wish::class);
    }


    public function findByTitle($title){
        $dql = "SELECT w FROM App\Entity\Wish w
            WHERE w.title = :title OR w.author = :author";

        $em = $this->getEntityManager();
        $q = $em->createQuery($dql);
        $q->setParameters(["title"=>$title,"author"=>"alkhgkjhgdel"]);


        return $q->getResult();

    }

    // /**
    //  * @return Wish[] Returns an array of Wish objects
    //  */
   
    public function findByAuthor($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.author = :val')            
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
 

    /*
    public function findOneBySomeField($value): ?Wish
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
