<?php

namespace App\Repository;

use App\Entity\Filiari;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Select;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Filiari>
 *
 * @method Filiari|null find($id, $lockMode = null, $lockVersion = null)
 * @method Filiari|null findOneBy(array $criteria, array $orderBy = null)
 * @method Filiari[]    findAll()
 * @method Filiari[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FiliariRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Filiari::class);
    }

    public function add(Filiari $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Filiari $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getFiliari()
    {
        $result = $this->createQueryBuilder('f')
            ->Select('f.id,f.codiceFiliare,f.citta,count(m.id) as nm')
            ->join('f.mezzis' ,'m')
            ->groupBy('m.filiare');

        return $result->getQuery()->getResult();
    }

    public function getSingleFiliare($id)
    {
        $result = $this->createQueryBuilder('f')
            ->Select('f.id,f.codiceFiliare,f.cap,f.prov,f.citta,f.telefono,f.indirizzo,f.email')
            ->where('f.id ='.$id);
            

        return $result->getQuery()->getResult();
    }



//    /**
//     * @return Filiari[] Returns an array of Filiari objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Filiari
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
