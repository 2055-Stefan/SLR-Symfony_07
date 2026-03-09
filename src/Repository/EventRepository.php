<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Event>
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    public function countAllEvents(): int
    {
        return $this->createQueryBuilder('e')
            ->select('COUNT(e.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
    
    /* oder kürzer, count gibt es schon als Funktion von ServiceEntityRepository
    public function countAllEvents(): int
    {
        return $this->count([]);
    }
    */


    public function findUpcomingEvents(): array
    {
    return $this->createQueryBuilder('e')
        ->where('e.startsAt >= :today')
        ->setParameter('today', new \DateTime())
        ->orderBy('e.startsAt', 'ASC')
        ->getQuery()
        ->getResult();
    }
    /* mit DQL würde es so ausschauen
    public function findUpcomingEvents(): array
    {
        return $this->getEntityManager()
            ->createQuery('
                SELECT e
                FROM App\Entity\Event e
                WHERE e.startsAt >= :today
                ORDER BY e.startsAt ASC
            ')
            ->setParameter('today', new \DateTime())
            ->getResult();
    }
    */
    

    //    /**
    //     * @return Event[] Returns an array of Event objects
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

    //    public function findOneBySomeField($value): ?Event
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
