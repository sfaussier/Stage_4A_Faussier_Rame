<?php

namespace Rh\UserBundle\Controller;

use Rh\UserBundle\RhUserBundle;

use Symfony\Component\BrowserKit\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Rh\UserBundle\Entity\ProfilHeureMax;
use Rh\UserBundle\Repository\ProfilHeureMaxRepository;

/**
 * Classe du controller de l'entitée ProfilHeureMax.
 * @author Simon
 *
 */
class ProfilHeureMaxController extends Controller
{
    
    public function addAction()
    {
        // Création de mon ProfilHeureMax
        $myPhm = new ProfilHeureMax();
        
        
    }
}