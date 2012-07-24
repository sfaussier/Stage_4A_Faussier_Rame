<?php

namespace Rh\AdminBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class EntrepriseType extends AbstractType {
	public function buildForm(FormBuilder $builder, array $options) {
		$builder->add('nom')->add('debutConges')->add('finConges');
	}

	public function getName() {
		return 'Rh_Adminbundle_entreprisetype';
	}

	public function getDefaultOptions(array $options) {
		return array('data_class' => 'Rh\AdminBundle\Entity\Entreprise',);
	}
}

