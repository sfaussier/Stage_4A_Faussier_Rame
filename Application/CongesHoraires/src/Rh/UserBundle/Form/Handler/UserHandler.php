<?php

namespace Rh\UserBundle\Form\Handler;

use Rh\UserBundle\Entity\User;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

/**
 * 
 * @author Simon
 *
 */
class UserHandler
{
    protected $form;
    protected $request;
    protected $em;
    
    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->form = $form;
        $this->request = $request;
        $this->em = $em;
    }
    
    public function process()
    {
        if( $this->request->getMethod() == 'POST' )
        {
            // Ici, on s'occupera de la création et de la gestion du formulaire.
            $this->form->bindRequest($this->request);
    
            // On vérifie que les valeurs du formulaire sont correctes
            if ($this->form->isValid())
            {
                $this->onSuccess($this->form->getData());
                return "true";
            } else {
                return "error";
            }
        }
        return "false";
    }
    
    public function onSuccess(User $user)
    {
        $user->setEnabled(true);
        $this->em->persist($user);
        $this->em->flush();
    }
}