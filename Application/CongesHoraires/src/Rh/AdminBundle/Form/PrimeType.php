<?php

namespace Rh\AdminBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PrimeType extends AbstractType {
	public function buildForm(FormBuilder $builder, array $options) {
		$builder->add('nom')->add('valeur');
	}

	public function getName() {
		return 'Rh_Adminbundle_primetype';
	}

	public function getDefaultOptions(array $options) {
		return array('data_class' => 'Rh\AdminBundle\Entity\Prime',);
	}
}

