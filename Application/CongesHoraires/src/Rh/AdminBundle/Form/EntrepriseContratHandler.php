<?php

namespace Rh\AdminBundle\Form;

use Rh\AdminBundle\Entity\Entreprise;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Rh\UserBundle\Entity\Contrat;
use Rh\UserBundle\Entity\User;

class EntrepriseContratHandler {
	protected $form;
	protected $request;
	protected $em;

	public function __construct(Form $form, Request $request, EntityManager $em) {
		$this->form = $form;
		$this->request = $request;
		$this->em = $em;
	}

	public function process() {
		if ($this->request->getMethod() == 'POST') {
			$this->form->bindRequest($this->request);
			if ($this->form->isValid()) {
				$this->onSuccess($this->form->getData());

				return true;
			}
		}

		return false;
	}

	public function onSuccess(Contrat $contrat) {
		$this->em->persist($contrat);
		$this->em->flush();
	}
}

