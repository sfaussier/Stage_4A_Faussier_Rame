<?php

namespace Rh\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProfilHeureMaxType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('nom')
                ->add('heureMax')
                ->add('heureMax12s');
    }
    
    public function getName()
    {
        return 'rh_user_profilHeureMaxType';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
                'data_class' => 'Rh\UserBundle\Entity\ProfilHeureMax', );
    }
}