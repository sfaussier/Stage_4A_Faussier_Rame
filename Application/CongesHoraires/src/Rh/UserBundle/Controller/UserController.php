<?php

namespace Rh\UserBundle\Controller;

use Rh\UserBundle\RhUserBundle;

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
use Rh\UserBundle\Form\Type\RechercheUserFormType;

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
        
        if( $formHandler->process() == "true" )
        {
            // On affiche un message flash pour dire que l'utilisateur a été enregistré.
            $this->get('session')->setFlash('success', 'Utilisateur enregistré.');
            
            // Puis on redirige vers la page d'ajout d'utilisateur vide.
            return $this->redirect( $this->generateUrl('rhuser_ajouter'));
        } elseif ($formHandler->process() == "error") {
            // On affiche un message flash pour dire que l'utilisateur a été enregistré.
            $this->get('session')->setFlash('error', 'Erreur dans le formulaire.');
        }
        return $this->render('RhUserBundle:User:ajouter.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * Fonction qui liste les utlisateurs en fonction de la recherche tapée.
     */
    public function listAction()
    {
        $request = $this->getRequest();
        // On rentre dans la condition si le mot "search" est dans l'url en tant que paramètre.
        if ($request->query->has('search')) 
        {
            // Réalisation de la requête permettant de récupérer les utilisateurs en fonction du nom.
            $qb = $this->getDoctrine()->getEntityManager()->createQueryBuilder();
            $qb->select('u')
                ->from('RhUserBundle:User', 'u')
                ->where('u.nom LIKE :nomCle')
                ->orderBy('u.nom', 'ASC')
                ->setParameter('nomCle', '%'.$request->query->get('search').'%');
            
            $users = $qb->getQuery()->getResult();
            
            // On retourne la page avec la liste des utilisateurs.
            return $this->render('RhUserBundle:User:list.html.twig', array(
                    'users' => $users));
        }
        
       // On retourne la page sans données.
       return $this->render('RhUserBundle:User:list.html.twig'); 
    }
    
    /**
     * Fonction pour modifier un utilisateur.
     */
    public function modifierAction($id)
    {
        // Récupération de l'utilsateur
        $user = $this->getDoctrine()
                        ->getEntityManager()
                        ->getRepository('RhUserBundle:User')
                        ->find($id);
        
        // Création du formulaire pré rempli
        $form = $this->createForm(new UserType(), $user);
        if ($user == null)
        {
            throw $this->createNotFoundException('Utilisateur[id='.$id.'] inexistant');
        } else {
            $formHandler = new UserHandler($form, 
                    $this->getRequest('request'), 
                    $this->getDoctrine()->getEntityManager());
            
            if( $formHandler->process() == "true" )
            {
                // On affiche un message flash pour dire que l'utilisateur a été modifié.
                $this->get('session')->setFlash('success', 'Utilisateur modifié.');
                
                // Puis on redirige vers la page de recherche d'utilisateur.
                return $this->redirect( $this->generateUrl('rhuser_list'));
            } elseif ($formHandler->process() == "error") {
                // On affiche un message flash pour dire que l'utilisateur a été enregistré.
                $this->get('session')->setFlash('error', 'Erreur dans le formulaire.');
            }
        }
        return $this->render('RhUserBundle:User:modifier.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * Fonction permettant de supprimer l'utilisateur désigné par l'id.
     */
    public function supprimerAction($id)
    {
        // Récupération de l'utilsateur
        $user = $this->getDoctrine()
                        ->getEntityManager()
                        ->getRepository('RhUserBundle:User')
                        ->find($id);
        
        $form = $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm();
        
        $request = $this->getRequest();
        
        $form->bindRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('RhUserBundle:User')->find($id);
        
            if (!$entity) {
                // On affiche un message flash pour dire que l'utilisateur a été enregistré.
                $this->get('session')->setFlash('error', 'Erreur de suppression.');
                throw $this->createNotFoundException('Impossible de trouver l\'entitée.');
            } else {
                $em->remove($entity);
                $em->flush();
                
                // On affiche un message flash pour dire que l'utilisateur a été modifié.
                $this->get('session')->setFlash('success', 'Utilisateur supprimé.');
                
                return $this->redirect($this->generateUrl('rhuser_list'));
            }
        }
        
        return $this->render('RhUserBundle:User:supprimer.html.twig', array(
                'form' => $form->createView(),
                'user' => $user));
    }
}