<?php

namespace Rh\UserBundle\Controller;

use Symfony\Component\BrowserKit\Request;

use Rh\UserBundle\Form\Handler\UserHandler;

use Rh\UserBundle\Form\Type\UserType;

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
        
        // Création du formulaire
        $form = $this->createForm(new UserType, $monUtilisateur);
        // Création du gestionnaire de formulaires (handler)
        $formHandler = new UserHandler($form, $this->get('request'), $this->getDoctrine()->getEntityManager());
        
        if( $formHandler->process() )
        {
            // On affiche un message flash pour dire que l'utilisateur a été enregistré.
            $this->get('session')->setFlash('success', 'Article bien enregistré');
            // Puis on redirige vers la page de visualisation de cet article.
            return $this->redirect( $this->generateUrl('rhuser_index'));
        }
        
    
        return $this->render('RhUserBundle:User:ajouter.html.twig', array('form' => $form->createView(),));
    }
}