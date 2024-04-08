<?php

namespace App\Repository;

use App\Entity\Mezzi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Mezzi>
 *
 * @method Mezzi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mezzi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mezzi[]    findAll()
 * @method Mezzi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MezziRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mezzi::class);
    }

    public function add(Mezzi $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Mezzi $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getFiliariMezzi($id)
    {

        $result = $this->createQueryBuilder('m')
            ->Select('f.id as filiareId,f.codiceFiliare as filiare,m.id,m.codiceMezzo,m.marca,m.modello,m.dataImm,m.classeEmiss,m.dataRev,t.descrizione,m.targa')
            ->join('m.filiare' ,'f')
            ->join('m.tipoMezzo' ,'t')
            ->where('m.filiare ='.$id);

        return $result->getQuery()->getResult();
    }

    public function getMezzo($id)
    {

        $result = $this->createQueryBuilder('m')
            ->Select('f.id as filiareId,f.codiceFiliare as filiare,m.id,m.codiceMezzo,m.marca,m.modello,m.dataImm,m.classeEmiss,m.dataRev,t.descrizione,m.targa')
            ->join('m.filiare' ,'f')
            ->join('m.tipoMezzo' ,'t')
            ->where('m.id ='.$id);

        return $result->getQuery()->getResult();
    }

    public function getMezzi()
    {
        $result = $this->createQueryBuilder('m')
            ->Select('f.id as filiareId,f.codiceFiliare as filiare,m.id,m.codiceMezzo,m.marca,m.modello,m.dataImm,m.classeEmiss,m.dataRev,t.descrizione,m.targa')
            ->join('m.filiare' ,'f')
            ->join('m.tipoMezzo' ,'t');

        return $result->getQuery()->getResult();
    }

//    /**
//     * @return Mezzi[] Returns an array of Mezzi objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Mezzi
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
