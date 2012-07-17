<?php

namespace Rh\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilder;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        // On récupère les attributs de base de FOSUB
        parent::buildForm($builder, $options);
        
        // On étend avec nos attributs ajoutés dans notre class User
        $builder->add('nom');
    }
    
    public function getName()
    {
        return 'rh_user_registration';
    }
}