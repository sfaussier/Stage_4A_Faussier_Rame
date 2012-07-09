<?php

namespace Rh\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rh\UserBundle\Entity\ProfilHeureMax
 *
 * @ORM\Table(name="rh_profilHeureMax")
 * @ORM\Entity(repositoryClass="Rh\UserBundle\Entity\ProfilHeureMaxRepository")
 */
class ProfilHeureMax
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
     * @ORM\Column(name="nom", type="string", length=32, nullable=true)
     */
    private $nom;

    /**
     * @var float $heureMax
     *
     * @ORM\Column(name="heureMax", type="float", unique=true, nullable=true)
     */
    private $heureMax;

    /**
     * @var float $heureMax12s
     *
     * @ORM\Column(name="heureMax12s", type="float", nullable=true)
     */
    private $heureMax12s;


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
     * Set heureMax
     *
     * @param float $heureMax
     */
    public function setHeureMax($heureMax)
    {
        $this->heureMax = $heureMax;
    }

    /**
     * Get heureMax
     *
     * @return float 
     */
    public function getHeureMax()
    {
        return $this->heureMax;
    }

    /**
     * Set heureMax12s
     *
     * @param float $heureMax12s
     */
    public function setHeureMax12s($heureMax12s)
    {
        $this->heureMax12s = $heureMax12s;
    }

    /**
     * Get heureMax12s
     *
     * @return float 
     */
    public function getHeureMax12s()
    {
        return $this->heureMax12s;
    }
}