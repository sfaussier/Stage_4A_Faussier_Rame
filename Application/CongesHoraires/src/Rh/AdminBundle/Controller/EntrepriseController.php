<?php

namespace Rh\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Rh\AdminBundle\Entity\Entreprise;
use Rh\AdminBundle\Form\EntrepriseType;
use Rh\AdminBundle\Entity\FeriePont;
use Rh\AdminBundle\Form\FeriePontType;
use Rh\AdminBundle\Form\FeriePontHandler;

use Rh\AdminBundle\Form\EntrepriseFeriePontType;
use Rh\AdminBundle\Form\EntrepriseHandler;

use Rh\UserBundle\Entity\User;
use Rh\UserBundle\Entity\Contrat;
use Rh\AdminBundle\Form\EntrepriseContratType;
use Rh\AdminBundle\Form\EntrepriseContratHandler;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

use JMS\SecurityExtraBundle\Annotation\Secure;

class EntrepriseController extends Controller {

	//permet d'ajouter des jours férié a une entreprise
	public function entrepriseAjouterFeriePontAction(Entreprise $entreprise) {

		// On crée le formulaire
		$form = $this->createForm(new EntrepriseFeriePontType, $entreprise);

		// On crée le gestionnaire pour ce formulaire, avec les outils dont il a besoin
		$formHandler = new EntrepriseHandler($form, $this->get('request'),
				$this->getDoctrine()->getEntityManager());

		// On exécute le traitement du formulaire. S'il retourne true, alors le formulaire a bien été traité
		if ($formHandler->process()) {

			$this->get('session')->setFlash('info', 'Modification des jours bien enregistré');

			return $this->redirect(	$this->generateUrl('RhAdmin_entreprise_voir',array('id' => $entreprise->getId())));
		}

		// Et s'il retourne false alors la requête n'était pas en POST ou le formulaire non valide.
		// On réaffiche donc le formulaire.
		return $this
				->render('RhAdminBundle:Entreprise:FPmodifier.html.twig',
						array('form' => $form->createView(),
							'entreprise' => $entreprise,
								
								));
	}
	
	
	//permet d'ajouter des contrat à l'entreprise
	public function entrepriseAjouterContratAction(Entreprise $entreprise) {
	
		$contrat = new Contrat();
		$contrat->setEntreprise($entreprise);
		// On crée le formulaire
		$form = $this->createForm(new EntrepriseContratType, $contrat);

		// On crée le gestionnaire pour ce formulaire, avec les outils dont il a besoin
		$formHandler = new EntrepriseContratHandler($form, $this->get('request'),
				$this->getDoctrine()->getEntityManager());
	
		
		// On exécute le traitement du formulaire. S'il retourne true, alors le formulaire a bien été traité
		if ($formHandler->process()) {
	
			$this->get('session')->setFlash('info', 'Contrat bien enregistré');
	
			return $this->redirect(	$this->generateUrl('RhAdmin_entreprise_voir',array('id' => $entreprise->getId())));
		}
		
		// Et s'il retourne false alors la requête n'était pas en POST ou le formulaire non valide.
		// On réaffiche donc le formulaire.
		return $this
		->render('RhAdminBundle:Entreprise:Cajouter.html.twig',
				array('form' => $form->createView(),
						'entreprise' => $entreprise,
	
				));
	}
	
	//permet de modifier de le contrat d'une entreprise,
	// NE MARCHE PAS, en effet comme contrat a 3 attributs il faut faire une fonction dans le repository
	public function entrepriseModifierContratAction(Entreprise $entreprise) {
	
		$contrat = new Contrat();
		// On crée le formulaire
		$form = $this->createForm(new EntrepriseContratType, $contrat);
	
		// On crée le gestionnaire pour ce formulaire, avec les outils dont il a besoin
		$formHandler = new EntrepriseContratHandler($form, $this->get('request'),
				$this->getDoctrine()->getEntityManager());
	
		// On exécute le traitement du formulaire. S'il retourne true, alors le formulaire a bien été traité
		if ($formHandler->process()) {
	
			$this->get('session')->setFlash('info', 'Contrat bien enregistré');
	
			return $this->redirect(	$this->generateUrl('RhAdmin_entreprise_voir',array('id' => $entreprise->getId())));
		}
	
		// Et s'il retourne false alors la requête n'était pas en POST ou le formulaire non valide.
		// On réaffiche donc le formulaire.
		return $this
		->render('RhAdminBundle:Entreprise:Cmodifier.html.twig',
				array('form' => $form->createView(),
						'entreprise' => $entreprise,
	
				));		
	}
	
}
