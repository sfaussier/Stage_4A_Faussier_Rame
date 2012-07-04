<?php

namespace Rh\PointageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('RhPointageBundle:Default:index.html.twig', array('name' => $name));
    }
}
