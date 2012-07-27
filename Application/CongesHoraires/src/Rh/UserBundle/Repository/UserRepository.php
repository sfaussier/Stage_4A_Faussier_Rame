<?php

namespace Rh\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    
    /******************************************* SEARCH ********************************************************/
    
    /**
     * Fonction qui récupère tous les utilisateurs n'ayant pas de chef
     * ou ayant pour chef celui passé en paramètre.
     * 
     * @param int $idChef
     */
    public function recupUserSansChefOuChefDefini($idChef)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        
        $qb->select('u')
            ->from('RhUserBundle:User', 'u')
            ->where('u.chef IS NULL')
            ->orWhere('u.chef = :chef')
            ->setParameter('chef', $idChef);
        
        return $qb->getQuery()->getResult();
    }
    
    
    /**
     * Fonction qui retourne tous les utilisateurs ayant le role passé en paramètre
     * 
     * 
     */
    public function searchUserByRole()
    {
        
    }
    
    /**
     *
     * @param unknown_type $name
     */
    public function searchUserByName($name)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
    
        $qb->select('u')
        ->from('RhUserBundle:User', 'u')
        ->where('u.nom LIKE :nomCle')
        ->orderBy('u.nom', 'ASC')
        ->setParameter('nomCle', '%'.$name.'%');
    
        return $qb->getQuery()->getResult();
    }
    
    
    /******************************************* UPDATE ********************************************************/
    
    /**
     * Fonction permettant d'enregistrer mes employés en fonction de leur chef.
     * 
     * @param int $chefId
     */
    public function saveEmployes($chefId, $employes)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        
        // Requête pour mettre les CHEF a NULL pour nos utilisateurs manipulés.
        $qb->update('RhUserBundle:User', 'u')
            ->set('u.chef', 'NULL')
            ->where('u.chef = :chef')
            ->setParameter('chef', $chefId);
        $p = $qb->getQuery()->execute();

        // Seconde requête pour lier les User à leur Chef
        if (!empty($employes)) {
            $qb->update('RhUserBundle:User', 'u')
                ->set('u.chef', ':chef')
                ->where('u.id IN (:employes)')
                ->setParameter('chef', $chefId)
                ->setParameter('employes', $employes);
            $p = $qb->getQuery()->execute();
        }
    }
    
    
}