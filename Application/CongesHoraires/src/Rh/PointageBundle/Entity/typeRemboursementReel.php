<?php

namespace Rh\PointageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rh\PointageBundle\Entity\typeRemboursementReel
 *
 * @ORM\Table(name="rh_typeRemboursementReel")
 * @ORM\Entity(repositoryClass="Rh\PointageBundle\Entity\typeRemboursementReelRepository")
 */
class typeRemboursementReel
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
     * @ORM\Column(name="nom", type="string", length=32 , unique=true, nullable=true)
     */
    private $nom;


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
}