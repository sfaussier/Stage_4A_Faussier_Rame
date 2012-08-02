<?php

namespace Rh\UserBundle\Service\Search;

use Doctrine\ORM\EntityManager;

class Basic
{
    /**
     * Notre EntityManager
     */
    protected $em;
    
    /**
     * Notre constructeur
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    /**
     * Ma fonction de recherche
     */
    public function search($table , $search)
    {
        return 'Test Service';
    }
}