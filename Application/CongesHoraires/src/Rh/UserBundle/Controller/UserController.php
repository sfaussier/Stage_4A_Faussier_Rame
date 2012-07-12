<?php

namespace Rh\UserBundle\Controller;

use FOS\UserBundle\Entity\UserManager;

use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use JMS\SecurityExtraBundle\Annotation\Secure;
use FOS\UserBundle\Model\UserManagerInterface;
use Rh\UserBundle\Entity\User;

class UserController extends Controller
{
    /**
     * Fonction permettant de récupérer l'utilisateur connecté
     */
    public function indexAction()
    {
        $utilisateur = $this->container->get('security.context')->getToken()->getUser();
        
        if (!is_object($utilisateur)) {
            throw new AccessDeniedException('Vous n\'êtes pas authentifié.');
        }
        return $this->render('RhUserBundle:User:index.html.twig', array('utilisateur' => $utilisateur));
    }
    
    /**
     * Fonction permettant d'ajouter un utilisateur
     */
    public function ajouterAction()
    {
        // Création de mon propre utilisateur créé avec mon entitée
        $monUtilisateur = new User();
        
        // Récupération du User Manager de FOSUB
        $userManager = $this->container->get('fos_user.user_manager');
        
        // Création d'un utilisateur qu'on récupère dans la variable $user
        $user = $userManager->createUser();
        
        $formBuilder = $this->createFormBuilder($user);
        $formBuilder->add('nom', 'text')
                    ->add('prenom', 'text')
                    ->add('mdp', 'password')
                    ->add('email', 'email')
                    ->add('entreeEntreprise', 'datetime')
                    ->add('cadre', 'checkbox');
        $form = $formBuilder->getForm();
        
        return $this->render('RhUserBundle:User:ajouter.html.twig', array('form' => $form->createView(),));
    }

}