<?php

namespace App\Repository;

use App\Entity\LineaComanda;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LineaComanda|null find($id, $lockMode = null, $lockVersion = null)
 * @method LineaComanda|null findOneBy(array $criteria, array $orderBy = null)
 * @method LineaComanda[]    findAll()
 * @method LineaComanda[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LineaComandaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LineaComanda::class);
    }

//    /**
//     * @return LineaComanda[] Returns an array of LineaComanda objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LineaComanda
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
