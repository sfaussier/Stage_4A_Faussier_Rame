<?php

namespace Rh\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//pour les contraintes :
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
//relations
use Rh\AdminBundle\Entity\FeriePont;

/**
 * Rh\AdminBundle\Entity\Entreprise
 *
 * @ORM\Table(name="rh_entreprise")
 * @ORM\Entity(repositoryClass="Rh\AdminBundle\Entity\EntrepriseRepository")
 */
class Entreprise {
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string $nom
	 *
	 * @ORM\Column(name="nom", type="string", length=32, unique=true, nullable=true)
	 * @Assert\MinLength(limit=1, message="Le nom de l'entreprise doit faire au moins {{ limit }} caract�re.")
	 */
	private $nom;

	/**
	 * @var date $debutConges
	 *
	 * @ORM\Column(name="debutConges", type="date", nullable=true)
	 * @Assert\Date()
	 */
	private $debutConges;

	/**
	 * @var date $finConges
	 *
	 * @ORM\Column(name="finConges", type="date", nullable=true)
	 * @Assert\Date()
	 */
	private $finConges;

	/**
	 * @ORM\ManyToMany(targetEntity="Rh\AdminBundle\Entity\FeriePont")
	 */
	private $feriePonts;

	public function __construct() {
		$this->feriePonts = new \Doctrine\Common\Collections\ArrayCollection;

	}
	public function getFeriePonts() {
		return $this->feriePonts;
	}
	public function addFeriePont(\Rh\AdminBundle\Entity\FeriePont $feriePont) {
		$this->feriePonts[] = $feriePont;
	}

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set nom
	 *
	 * @param string $nom
	 */
	public function setNom($nom) {
		$this->nom = $nom;
	}

	/**
	 * Get nom
	 *
	 * @return string 
	 */
	public function getNom() {
		return $this->nom;
	}

	/**
	 * Set debutConges
	 *
	 * @param date $debutConges
	 */
	public function setDebutConges($debutConges) {
		$this->debutConges = $debutConges;
	}

	/**
	 * Get debutConges
	 *
	 * @return date 
	 */
	public function getDebutConges() {
		return $this->debutConges;
	}

	/**
	 * Set finConges
	 *
	 * @param date $finConges
	 */
	public function setFinConges($finConges) {
		$this->finConges = $finConges;
	}

	/**
	 * Get finConges
	 *
	 * @return date 
	 */
	public function getFinConges() {
		return $this->finConges;
	}
}
