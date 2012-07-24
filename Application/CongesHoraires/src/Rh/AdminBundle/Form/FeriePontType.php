<?php

namespace Rh\AdminBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FeriePontType extends AbstractType {
	public function buildForm(FormBuilder $builder, array $options) {
		$builder->add('nom')
				->add('type','choice', array(
						                        'choices' => array(
									                                'FERIE' => 'férié',
									                                'PONT' => 'pont',
						                        					'AUTRE' => 'autre'
						                        					),
									             'multiple' => false
											)
					)
				->add('date', 'date',	array('format' => 'd/M/y',
											'empty_value' => array(
																	'day' => 'Jour','month' => 'Mois'
																	),
										
											)
					);
	}

	public function getName() {
		return 'Rh_Adminbundle_ferieponttype';
	}

	public function getDefaultOptions(array $options) {
		return array('data_class' => 'Rh\AdminBundle\Entity\FeriePont',);
	}
}

