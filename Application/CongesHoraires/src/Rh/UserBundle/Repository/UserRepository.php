<?php

namespace Rh\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Classe contenant les requêtes sur l'entitée User.
 * @author Simon
 *
 */
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
        // Récupération du QueryBuilder de Doctrine.
        $qb = $this->getEntityManager()->createQueryBuilder();
        
        // Création de la requête.
        $qb->select('u')
            ->from('RhUserBundle:User', 'u')
            ->where('u.chef IS NULL')
            ->orWhere('u.chef = :chef')
            ->setParameter('chef', $idChef)
            ->andWhere('u.id != :chef')
            ->setParameter('chef', $idChef);
        
        // Envoie du résultat de la requête.
        return $qb->getQuery()->getResult();
    }
    
    
    /**
     * Fonction de recherche d'utilisateur par rapport à une chaine de caractères.
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
        // Exécution de la requête UPDATE.
        $p = $qb->getQuery()->execute();

        // Seconde requête pour lier les User à leur Chef
        // On fait cette requête uniquement si il y a des employés pour le chef.
        if (!empty($employes)) {
            $qb->update('RhUserBundle:User', 'u')
                ->set('u.chef', ':chef')
                ->where('u.id IN (:employes)')
                ->setParameter('chef', $chefId)
                ->setParameter('employes', $employes);
            // Exécution de la requête UPDATE.
            $p = $qb->getQuery()->execute();
        }
    }
    
    
}