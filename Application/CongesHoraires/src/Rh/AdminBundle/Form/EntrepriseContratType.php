<?php

namespace Rh\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class EntrepriseContratType extends AbstractType {
	public function buildForm(FormBuilder $builder, array $options) {
		$builder
		->add('user', 'entity',
				array('class' => 'Rh\UserBundle\Entity\User',
						'property' => 'nom','multiple' => false))
		->add('contratType', 'entity',
				array('class' => 'Rh\AdminBundle\Entity\ContratType',
						'property' => 'nom','multiple' => false))
		->add('salaireBase')
		->add('matricule')
		->add('termine')
		;
	}


	public function getName() {
		return 'Rh_Adminbundle_entreprisecontrattype';
	}

	public function getDefaultOptions(array $options) {
		return array('data_class' => 'Rh\UserBundle\Entity\Contrat',);
	}
}

