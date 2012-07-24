<?php

namespace Rh\AdminBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class EntrepriseFeriePontType extends AbstractType {
	public function buildForm(FormBuilder $builder, array $options) {
		$builder
		/*->add('feriePonts', 'entity', array(
											'class' => 'RhAdminBundle:FeriePont',
											'query_builder' => function(EntityRepository $er)
											{
											return $er->createQueryBuilder('fp')
											->orderBy('fp.date', 'DESC');
											},
			)*/
		->add('feriePonts', 'entity',
				array('class' => 'Rh\AdminBundle\Entity\FeriePont',
						'property' => 'nom','multiple' => true))
											
		;
	}


	public function getName() {
		return 'Rh_Adminbundle_entrepriseferieponttype';
	}

	public function getDefaultOptions(array $options) {
		return array('data_class' => 'Rh\AdminBundle\Entity\Entreprise',);
	}
}

