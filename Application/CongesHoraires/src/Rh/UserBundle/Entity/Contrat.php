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
	private $user;
	
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
	
	
	
	
	
	
	
	/**
	 * Get salaireBase
	 *
	 * @return float
	 */
	public function getSalaireBase()
	{
		return $this->salaireBase;
	}
	/**
	 * Set salaireBase
	 *
	 * @param float $salaireBase
	 */
	public function setSalaireBase( $salaireBase) {
		$this->salaireBase=$salaireBase;
	}
	
	/**
	 * Get entreprise
	 *
	 * @return integer
	 */
	public function getEntreprise() {
		return $this->entreprise;
	}
	/**
	 * Set entreprise
	 *
	 * @param integer $entreprise
	 */
	public function setEntreprise( $entreprise) {
		$this->entreprise=$entreprise;
	}
	/**
	 * Get contratType
	 *
	 * @return integer
	 */
	public function getContratType() {
		return $this->contratType;
	}
	/**
	 * Set contratType
	 *
	 * @param integer $contratType
	 */
	public function setContratType( $contratType) {
		$this->contratType=$contratType;
	}
	/**
	 * Get utilisateur
	 *
	 * @return integer
	 */
	public function getUtilisateur() {
		return $this->utilisateur;
	}
	/**
	 * Set utilisateur
	 *
	 * @param integer $utilisateur
	 */
	public function setUtilisateur($utilisateur) {
		$this->utilisateur=$utilisateur;
	}
	
}