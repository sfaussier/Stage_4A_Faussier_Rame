<?php

namespace Rh\AdminBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ContratTypeType extends AbstractType {
	public function buildForm(FormBuilder $builder, array $options) {
		$builder->add('nom')
				->add('heureHebdo')
				->add('jourParAn')
				->add('rttAnnuels')
				->add('heureMajoree')
				->add('heureSuperMajoree');
	}

	public function getName() {
		return 'Rh_Adminbundle_contrattypetype';
	}

	public function getDefaultOptions(array $options) {
		return array('data_class' => 'Rh\AdminBundle\Entity\ContratType',);
	}
}

