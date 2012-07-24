<?php

namespace Rh\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//pour les contraintes :
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Rh\AdminBundle\Entity\FeriePont
 *
 * @ORM\Table(name="rh_feriePont")
 * @ORM\Entity(repositoryClass="Rh\AdminBundle\Entity\FeriePontRepository")
 */
class FeriePont {
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
	 * @ORM\Column(name="nom", type="string", length=64, unique=true, nullable=true)
	 */
	private $nom;

	/**
	 * @var string $type
	 * @Assert\MinLength(limit=1, message="Le nom de cet �v�nement doit faire au moins {{ limit }} caract�re.")
	 * @ORM\Column(name="type", type="string", length=32, nullable=true)
	 */
	private $type;

	/**
	 * @var date $date
	 * @Assert\Date()
	 * @ORM\Column(name="date", type="date", nullable=true)
	 */
	private $date;

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
	 * Set type
	 *
	 * @param string $type
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Get type
	 *
	 * @return string 
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Set date
	 *
	 * @param date $date
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * Get date
	 *
	 * @return date 
	 */
	public function getDate() {
		return $this->date;
	}
}
