<?php

namespace Rh\AdminBundle\Form;
use Rh\AdminBundle\Entity\Prime;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class PrimeHandler {
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

			var_dump($this->form->getData());
			if ($this->form->isValid()) {
				$this->onSuccess($this->form->getData());

				return true;
			}
		}

		return false;
	}

	public function onSuccess(Prime $prime) {
		$this->em->persist($prime);
		$this->em->flush();
	}
}

