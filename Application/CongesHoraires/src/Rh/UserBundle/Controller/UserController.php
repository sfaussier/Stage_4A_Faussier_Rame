<?php

namespace Rh\UserBundle\Controller;

use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use JMS\SecurityExtraBundle\Annotation\Secure;

class UserController extends Controller
{
    public function indexAction()
    {
        // $userManeger = $this->container->get('fos_user.user_manager');
        $utilisateur = $this->container->get('security.context')->getToken()->getUser();
        
        if (!is_object($utilisateur)) {
            throw new AccessDeniedException('Vous n\'êtes pas authentifié.');
        }
        return $this->render('RhUserBundle:User:index.html.twig', array('utilisateur' => $utilisateur));
    }
}