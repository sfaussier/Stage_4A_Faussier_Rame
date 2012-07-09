<?php

namespace Rh\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//pour les contraintes :
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Rh\AdminBundle\Entity\ContratType
 *
 * @ORM\Table(name="rh_contrattype")
 * @ORM\Entity(repositoryClass="Rh\AdminBundle\Entity\ContratTypeRepository")
 */
class ContratType
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
     * @Assert\MinLength(limit=1, message="Le nom de l'entreprise doit faire au moins {{ limit }} caractère.")
     */
    private $nom;

    /**
     * @var float $heureHebdo
     *
     * @ORM\Column(name="heureHebdo", type="float", nullable=true)
     */
    private $heureHebdo;

    /**
     * @var float $jourParAn
     *
     * @ORM\Column(name="jourParAn", type="float", nullable=true)
     */
    private $jourParAn;

    /**
     * @var float $rttAnnuels
     *
     * @ORM\Column(name="rttAnnuels", type="float", nullable=true)
     */
    private $rttAnnuels;

    /**
     * @var float $heureMajoree
     *
     * @ORM\Column(name="heureMajoree", type="float", nullable=true)
     */
    private $heureMajoree;

    /**
     * @var float $heureSuperMajoree
     *
     * @ORM\Column(name="heureSuperMajoree", type="float", nullable=true)
     */
    private $heureSuperMajoree;


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
     * Set heureHebdo
     *
     * @param float $heureHebdo
     */
    public function setHeureHebdo($heureHebdo)
    {
        $this->heureHebdo = $heureHebdo;
    }

    /**
     * Get heureHebdo
     *
     * @return float 
     */
    public function getHeureHebdo()
    {
        return $this->heureHebdo;
    }

    /**
     * Set jourParAn
     *
     * @param float $jourParAn
     */
    public function setJourParAn($jourParAn)
    {
        $this->jourParAn = $jourParAn;
    }

    /**
     * Get jourParAn
     *
     * @return float 
     */
    public function getJourParAn()
    {
        return $this->jourParAn;
    }

    /**
     * Set rttAnnuels
     *
     * @param float $rttAnnuels
     */
    public function setRttAnnuels($rttAnnuels)
    {
        $this->rttAnnuels = $rttAnnuels;
    }

    /**
     * Get rttAnnuels
     *
     * @return float 
     */
    public function getRttAnnuels()
    {
        return $this->rttAnnuels;
    }

    /**
     * Set heureMajoree
     *
     * @param float $heureMajoree
     */
    public function setHeureMajoree($heureMajoree)
    {
        $this->heureMajoree = $heureMajoree;
    }

    /**
     * Get heureMajoree
     *
     * @return float 
     */
    public function getHeureMajoree()
    {
        return $this->heureMajoree;
    }

    /**
     * Set heureSuperMajoree
     *
     * @param float $heureSuperMajoree
     */
    public function setHeureSuperMajoree($heureSuperMajoree)
    {
        $this->heureSuperMajoree = $heureSuperMajoree;
    }

    /**
     * Get heureSuperMajoree
     *
     * @return float 
     */
    public function getHeureSuperMajoree()
    {
        return $this->heureSuperMajoree;
    }
}