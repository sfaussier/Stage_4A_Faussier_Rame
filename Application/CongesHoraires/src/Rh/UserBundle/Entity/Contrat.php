<?php

namespace Rh\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//pour les contraintes :
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Rh\UserBundle\Entity\Contrat
 * @ORM\Entity
 * @ORM\Table(name="rh_contrat")
 */
class Contrat
{
	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="Rh\UserBundle\Entity\User")
	 */
	private $utilisateur;
	
	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="Rh\AdminBundle\Entity\Entreprise")
	 */
	private $entreprise;
	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="Rh\AdminBundle\Entity\ContratType")
	 */
	private $contratType;
	
	/**
	 * @var float $salaireBase
	 *
	 * @ORM\Column(name="salaireBase", type="float")
	 */
	private $salaireBase;
}