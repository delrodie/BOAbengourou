<?php

namespace AppBundle\Repository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * Recherche du dernier article de la table Post
     *
     * Author: Delrodie AMOIKON
     * Date: 14/10/2017 06:03
     * v1.0
     */
    public function findLatest()
    {
        $qb = $this->createQueryBuilder('p')
                    ->orderBy('p.id', 'DESC')
                    ->setMaxResults(1)
                    ->getQuery()->getSingleResult();

        return $qb;
    }

    /**
     * Recherche des 4 derniers articles de la table Post
     *
     * Author: Delrodie AMOIKON
     * Date: 15/10/2017 13:22
     * v1.0
     */
    public function findSecondaire()
    {
        $qb = $this->createQueryBuilder('p')
                    ->orderBy('p.id', 'DESC')
                    ->setMaxResults(4)
                    ->getQuery()->getResult();

        return $qb;
    }

    /**
     * Recherche dees articles concernant la politique
     *
     *  Author: Delrodie AMOIKON
     *  Date: 15/10/2017 15:35
     *  v1.0
     */
    public function findByType($type1, $type2, $offset, $limit)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQuery('
                      SELECT p, t
                      FROM AppBundle:Post p
                      LEFT JOIN p.typost t
                      WHERE t.nom LIKE :type1
                      OR t.nom LIKE :type2
                      AND p.statut = :actif
                      ORDER BY p.id DESC
                  ')
                  ->setFirstResult($offset)
                  ->setMaxResults($limit)
                  ->setParameters(array(
                        'type1' => '%'.$type1.'%',
                        'type2' => '%'.$type2.'%',
                        'actif' => 1
                  ));

        return $qb->getResult();
    }

    /**
     * Recherche dees articles concernant la jeunesse
     *
     *  Author: Delrodie AMOIKON
     *  Date: 16/10/2017 09:50
     *  v1.0
     */
    public function findByTag($type1, $type2, $offset, $limit)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQuery('
                      SELECT p, t
                      FROM AppBundle:Post p
                      LEFT JOIN p.typost t
                      WHERE p.tag LIKE :type1
                      OR p.tag LIKE :type2
                      AND p.statut = :actif
                      ORDER BY p.id DESC
                  ')
                  ->setFirstResult($offset)
                  ->setMaxResults($limit)
                  ->setParameters(array(
                        'type1'=> '%'.$type1.'%',
                        'type2'=> '%'.$type2.'%',
                        'actif' => 1
                  ));

        return $qb->getResult();
    }

    /**
     * Calcul du nombre d'articles selon le type
     *
     * Author: Delrodie AMOIKON
     * Date: 18/10/2017
     * v1.0
     */
    public function findNbArticleByTypost($type)
    {
        return $qb = $this->createQueryBuilder('p')
                         ->select('count(p.id)')
                         ->join('p.typost', 't')
                         ->where('t.nom LIKE :type')
                         ->setParameter('type', '%'.$type.'%')
                         ->getQuery()
                         ->getSingleScalarResult();
    }

    /**
     * Recherche article
     *
     * Author: Delrodie AMOIKON
     * Date: 18/10/2017
     * v1.0
     */
    public function findBySlug($slug)
    {
        return $qb = $this->createQueryBuilder('p')
                          ->select('p')
                          ->addSelect('t')
                          ->join('p.typost', 't')
                          ->where('p.slug = :slug')
                          ->setParameter('slug', $slug)
                          ->getQuery()
                          ->getSingleResult();
    }

    /**
     * Recherche article
     *
     * Author: Delrodie AMOIKON
     * Date: 18/10/2017
     * v1.0
     */
    public function findSimilaire($type, $slug)
    {
        return $qb = $this->createQueryBuilder('p')
                          ->select('p')
                          ->addSelect('t')
                          ->join('p.typost', 't')
                          ->where('p.slug <> :slug')
                          ->andWhere('t.slug = :typeSlug')
                          ->orderBy('p.id', 'DESC')
                          ->setMaxResults(4)
                          ->setParameters(array(
                                'slug'  => $slug,
                                'typeSlug' => $type,
                          ))
                          ->getQuery()
                          ->getResult();
    }
    
}
