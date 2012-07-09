<?php

namespace Rh\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rh\AdminBundle\Entity\Prime
 *
 * @ORM\Table(name="rh_prime")
 * @ORM\Entity(repositoryClass="Rh\AdminBundle\Entity\PrimeRepository")
 */
class Prime
{
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
     */
    private $nom;

    /**
     * @var float $valeur
     *
     * @ORM\Column(name="valeur", type="float", nullable=true)
     */
    private $valeur;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set valeur
     *
     * @param float $valeur
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    }

    /**
     * Get valeur
     *
     * @return float 
     */
    public function getValeur()
    {
        return $this->valeur;
    }
}