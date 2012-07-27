<?php

namespace Rh\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ChefType extends AbstractType
{
    /**
     * Création d'une variable $employes permettant de faire la liste des User employés du chef étudié.
     */
    protected $employes;
    
    public function __construct($employes)
    {
        $this->setEmployes($employes);
    }
    
    public function getEmployes()
    {
        return $this->employes;
    }
    
    public function setEmployes($employes)
    {
        $this->employes = $employes;
    }
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $choices = array();
        $actives = array();
        
        // On fait un tableau contenant tous les employés demandés.
        foreach ($this->employes as $key => $employe)
        {
            $choices[$employe->getId()] = $employe->getNom().' '.$employe->getPrenom();
        }
        $builder->add('employes', 'choice', array(
                'label' => 'Liste des employés',
                'expanded' => true,
                'multiple' => true,
                'choices' => $choices ));
    }
    
    public function getName()
    {
        return 'rh_user_gestion_chef';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
                'data_class' => 'Rh\UserBundle\Entity\User', );
    }
}