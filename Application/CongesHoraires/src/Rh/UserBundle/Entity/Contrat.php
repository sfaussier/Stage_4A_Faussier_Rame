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
	 * @var string $matricule
	 *
	 * @ORM\Column(name="matricule", type="string", length=4, nullable=true)
	 * @Assert\NotBlank()
	 **/
	private $matricule;
	
	/**
	 * @var boolean $termine
	 *
	 * @ORM\Column(name="termine", type="boolean", nullable=true)
	 **/
	private $termine;
	
	
	
	
	
	
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
	 * Get user
	 *
	 * @return integer
	 */
	public function getUser() {
		return $this->user;
	}
	/**
	 * Set user
	 *
	 * @param integer $user
	 */
	public function setUser($user) {
		$this->user=$user;
	}
	/**
	 * Get matricule
	 *
	 * @return string
	 */
	public function getMatricule() {
		return $this->user;
	}
	/**
	 * Set matricule
	 *
	 * @param string $matricule
	 */
	public function setMatricule($matricule) {
		$this->matricule=$matricule;
	}
	/**
	 * Get termine
	 *
	 * @return boolean
	 */
	public function getTermine() {
		return $this->termine;
	}
	/**
	 * Set termine
	 *
	 * @param boolean $termine
	 */
	public function setTermine($termine) {
		$this->termine=$termine;
	}
	
}