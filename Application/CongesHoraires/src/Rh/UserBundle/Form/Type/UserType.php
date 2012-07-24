<?php

namespace Rh\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('nom')
                ->add('prenom')
                ->add('email')
                ->add('plainPassword', 'repeated', array('type' => 'password'))
                ->add('entreeEntreprise')
                ->add('cadre')
                ->add('roles', 'choice', array(
							                        'choices' => array(
							                                'ROLE_UTILISATEUR' => 'ROLE_UTILISATEUR',
							                                'ROLE_ADMINISTRATEUR' => 'ROLE_ADMINISTRATEUR'),
							                        'multiple' => true));
    }
    
    public function getName()
    {
        return 'rh_user_usertype';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
                'data_class' => 'Rh\UserBundle\Entity\User', );
    }
}