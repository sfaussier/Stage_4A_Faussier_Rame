<?php

namespace Rh\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Rh\AdminBundle\Entity\EntrepriseRepository;

use Rh\AdminBundle\Entity\Entreprise;
use Rh\AdminBundle\Form\EntrepriseType;
use Rh\AdminBundle\Form\EntrepriseHandler;

use Rh\AdminBundle\Entity\Prime;
use Rh\AdminBundle\Form\PrimeType;
use Rh\AdminBundle\Form\PrimeHandler;

use Rh\AdminBundle\Entity\ContratType;
use Rh\AdminBundle\Form\ContratTypeType;
use Rh\AdminBundle\Form\ContratTypeHandler;

use Rh\AdminBundle\Entity\FeriePont;
use Rh\AdminBundle\Form\FeriePontType;
use Rh\AdminBundle\Form\FeriePontHandler;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

use JMS\SecurityExtraBundle\Annotation\Secure;

class AdminController extends Controller {

	public function entrepriseVoirAction(Entreprise $entreprise) {

		$listeFeriePonts = $this->getDoctrine()->getEntityManager()
				->getRepository('RhAdminBundle:Entreprise')
				->chercherFeriePonts($entreprise);
		
		$listeContrats = $this->getDoctrine()->getEntityManager()
				->getRepository('RhUserBundle:Contrat')
				->findByEntreprise($entreprise->getId());
		var_dump($listeContrats);

		return $this
				->render('RhAdminBundle:Admin:voir.html.twig',
						array('entreprise' => $entreprise,
								'feriePonts' => $listeFeriePonts,
								'contrats' => $listeContrats
								)
						
						);
	}

	public function entrepriseAjouterAction() {

		$entreprise = new Entreprise;

		// On crÃ©e le formulaire
		$form = $this->createForm(new EntrepriseType, $entreprise);

		// On crÃ©e le gestionnaire pour ce formulaire, avec les outils dont il a besoin
		$formHandler = new EntrepriseHandler($form, $this->get('request'),
				$this->getDoctrine()->getEntityManager());

		// On exÃ©cute le traitement du formulaire. S'il retourne true, alors le formulaire a bien Ã©tÃ© traitÃ©
		if ($formHandler->process()) {
			return $this
					->redirect(
							$this
									->generateUrl('RhAdmin_entreprise_voir',
											array('id' => $entreprise->getId())));
		}

		// Et s'il retourne false alors la requÃªte n'Ã©tait pas en POST ou le formulaire non valide.
		// On rÃ©affiche donc le formulaire.
		return $this
				->render('RhAdminBundle:Admin:ajouter.html.twig',
						array('form' => $form->createView(),));
	}

	public function entrepriseModifierAction(Entreprise $entreprise) {

		$form = $this->createForm(new EntrepriseType, $entreprise);
		$formHandler = new EntrepriseHandler($form, $this->get('request'),
				$this->getDoctrine()->getEntityManager());

		if ($formHandler->process()) {
			return $this
					->redirect(
							$this
									->generateUrl('RhAdmin_entreprise_voir',
											array('id' => $entreprise->getId())));
		}

		return $this
				->render('RhAdminBundle:Admin:modifier.html.twig',
						array('form' => $form->createView(),
								'entreprise' => $entreprise));
	}

	public function entrepriseSupprimerAction(Entreprise $entreprise) {
		if ($this->get('request')->getMethod() == 'POST') {
			$em = $this->getDoctrine()->getEntityManager();
			$em->remove($entreprise);
			$em->flush();

			// Si la requête est en POST, on supprimera l'article.
			$this->get('session')->setFlash('info', 'Entreprise supprimée');

			// Puis on redirige vers l'accueil.
			return $this
					->redirect($this->generateUrl('RhAdmin_administration'));
		}
		return $this
				->render('RhAdminBundle:Admin:supprimer.html.twig',
						array('entreprise' => $entreprise));
	}

	public function administrationAction() {
		$listeEntreprises = $this->getDoctrine()->getEntityManager()
				->getRepository('RhAdminBundle:Entreprise')->findAll();
		$listeContrat = $this->getDoctrine()->getEntityManager()
				->getRepository('RhAdminBundle:ContratType')->findAll();
		$listePrimes = $this->getDoctrine()->getEntityManager()
				->getRepository('RhAdminBundle:Prime')->findAll();
		$listeFeriePonts = $this->getDoctrine()->getEntityManager()
				->getRepository('RhAdminBundle:FeriePont')->findAll();

		return $this
				->render('RhAdminBundle:Admin:administration.html.twig',
						array('entreprises' => $listeEntreprises,
								'primes' => $listePrimes,
								'feriePonts' => $listeFeriePonts,
								'contrats' => $listeContrat,
						));
	}

	public function feriePontAjouterAction() {

		$feriePont = new FeriePont;

		// On crée le formulaire
		$form = $this->createForm(new FeriePontType, $feriePont);

		// On crée le gestionnaire pour ce formulaire, avec les outils dont il a besoin
		$formHandler = new FeriePontHandler($form, $this->get('request'),
				$this->getDoctrine()->getEntityManager());

		// On exécute le traitement du formulaire. S'il retourne true, alors le formulaire a bien été traité
		if ($formHandler->process()) {

			$this->get('session')->setFlash('info', 'Jour bien enregistré');

			return $this
					->redirect(
							$this
									->generateUrl('RhAdmin_feriePont_voir',
											array('id' => $feriePont->getId())));
		}

		// Et s'il retourne false alors la requête n'était pas en POST ou le formulaire non valide.
		// On réaffiche donc le formulaire.
		return $this
				->render('RhAdminBundle:FeriePont:ajouter.html.twig',
						array('form' => $form->createView(),));
	}
	public function feriePontVoirAction(FeriePont $feriePont) {
		return $this
				->render('RhAdminBundle:FeriePont:voir.html.twig',
						array('feriePont' => $feriePont));
	}
	public function feriePontModifierAction(FeriePont $feriePont) {

		$form = $this->createForm(new FeriePontType, $feriePont);
		$formHandler = new FeriePontHandler($form, $this->get('request'),
				$this->getDoctrine()->getEntityManager());

		if ($formHandler->process()) {
			return $this
					->redirect(
							$this
									->generateUrl('RhAdmin_feriePont_voir',
											array('id' => $feriePont->getId())));
		}

		return $this
				->render('RhAdminBundle:FeriePont:modifier.html.twig',
						array('form' => $form->createView(),
								'feriePont' => $feriePont));
	}

	public function feriePontSupprimerAction(FeriePont $feriePont) {
		if ($this->get('request')->getMethod() == 'POST') {
			$em = $this->getDoctrine()->getEntityManager();
			$em->remove($feriePont);
			$em->flush();

			// Si la requête est en POST, on supprimera l'article.
			$this->get('session')->setFlash('info', 'Jour de congé supprimé');

			// Puis on redirige vers l'accueil.
			return $this
					->redirect($this->generateUrl('RhAdmin_administration'));
		}
		return $this
				->render('RhAdminBundle:FeriePont:supprimer.html.twig',
						array('feriePont' => $feriePont));
	}

	public function primeVoirAction(Prime $prime) {
		return $this
				->render('RhAdminBundle:Prime:voir.html.twig',
						array('prime' => $prime));
	}

	public function primeAjouterAction() {

		$prime = new Prime;

		// On crÃ©e le formulaire
		$form = $this->createForm(new PrimeType, $prime);

		// On crÃ©e le gestionnaire pour ce formulaire, avec les outils dont il a besoin
		$formHandler = new PrimeHandler($form, $this->get('request'),
				$this->getDoctrine()->getEntityManager());

		// On exÃ©cute le traitement du formulaire. S'il retourne true, alors le formulaire a bien Ã©tÃ© traitÃ©
		if ($formHandler->process()) {
			return $this
					->redirect(
							$this
									->generateUrl('RhAdmin_prime_voir',
											array('id' => $prime->getId())));
		}

		// Et s'il retourne false alors la requÃªte n'Ã©tait pas en POST ou le formulaire non valide.
		// On rÃ©affiche donc le formulaire.
		return $this
				->render('RhAdminBundle:Prime:ajouter.html.twig',
						array('form' => $form->createView(),));
	}
	public function primeModifierAction(Prime $prime) {

		$form = $this->createForm(new PrimeType, $prime);
		$formHandler = new PrimeHandler($form, $this->get('request'),
				$this->getDoctrine()->getEntityManager());

		if ($formHandler->process()) {
			return $this
					->redirect(
							$this
									->generateUrl('RhAdmin_prime_voir',
											array('id' => $prime->getId())));
		}

		return $this
				->render('RhAdminBundle:Prime:modifier.html.twig',
						array('form' => $form->createView(), 'prime' => $prime));
	}

	public function primeSupprimerAction(Prime $prime) {
		if ($this->get('request')->getMethod() == 'POST') {
			$em = $this->getDoctrine()->getEntityManager();
			$em->remove($prime);
			$em->flush();

			// Si la requête est en POST, on supprimera l'article.
			$this->get('session')->setFlash('info', 'Jour de congé supprimée');

			// Puis on redirige vers l'accueil.
			return $this
					->redirect($this->generateUrl('RhAdmin_administration'));
		}
		return $this
				->render('RhAdminBundle:Prime:supprimer.html.twig',
						array('prime' => $prime));
	}

	public function contratTypeVoirAction(ContratType $contratType) {
		return $this
				->render('RhAdminBundle:ContratType:voir.html.twig',
						array('contratType' => $contratType));
	}

	public function contratTypeAjouterAction() {

		$contratType = new ContratType();

		// On crÃ©e le formulaire
		$form = $this->createForm(new ContratTypeType, $contratType);

		// On crÃ©e le gestionnaire pour ce formulaire, avec les outils dont il a besoin
		$formHandler = new ContratTypeHandler($form, $this->get('request'),
				$this->getDoctrine()->getEntityManager());

		// On exÃ©cute le traitement du formulaire. S'il retourne true, alors le formulaire a bien Ã©tÃ© traitÃ©
		if ($formHandler->process()) {
			return $this
					->redirect(
							$this
									->generateUrl('RhAdmin_contratType_voir',
											array('id' => $contratType->getId())));
		}

		// Et s'il retourne false alors la requÃªte n'Ã©tait pas en POST ou le formulaire non valide.
		// On rÃ©affiche donc le formulaire.
		return $this
				->render('RhAdminBundle:ContratType:ajouter.html.twig',
						array('form' => $form->createView(),));
	}

	public function contratTypeModifierAction(ContratType $contratType) {

		$form = $this->createForm(new ContratTypeType, $contratType);
		$formHandler = new ContratTypeHandler($form, $this->get('request'),
				$this->getDoctrine()->getEntityManager());

		if ($formHandler->process()) {
			return $this
					->redirect(
							$this
									->generateUrl('RhAdmin_contratType_voir',
											array('id' => $contratType->getId())));
		}

		return $this
				->render('RhAdminBundle:ContratType:modifier.html.twig',
						array('form' => $form->createView(),
								'contratType' => $contratType));
	}

	public function contratTypeSupprimerAction(ContratType $contratType) {
		if ($this->get('request')->getMethod() == 'POST') {
			$em = $this->getDoctrine()->getEntityManager();
			$em->remove($contratType);
			$em->flush();

			// Si la requête est en POST, on supprimera l'article.
			$this->get('session')->setFlash('info', 'Contrat supprimé');

			// Puis on redirige vers l'accueil.
			return $this
					->redirect($this->generateUrl('RhAdmin_administration'));
		}
		return $this
				->render('RhAdminBundle:ContratType:supprimer.html.twig',
						array('contratType' => $contratType));
	}

}
