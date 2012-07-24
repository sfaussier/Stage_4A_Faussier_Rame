<?php

namespace Rh\UserBundle\Entity;

use FOS\UserBundle\Validator\Unique;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="rh_user")
 * @UniqueEntity("username")
 */
class User extends BaseUser
{
    /**
     * Attributs utilisés dans la classe FOSUserBundle()
     * username : matricule de notre utilisateur
     * email : email de l'utilsateur
     * password : password de l'utilisateur
     * 
     * Ces attributs ne seront pas ajoutés dans la liste ci-dessous car ils sont hérités de 
     * la classe FOSUserBundle().
     */
    
    /**
     * Cet attribut est surchargé mais fait parti de FOSUserBundle.
     * Il n'aura donc pas de GETER ni de SETER.
     * 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Cet attribut est surchargé pour pouvoir dire qu'il est unique.
     * @var string
     */
    protected $username;
    
    /**
     * ***************** Déclaration des attributs de notre propre classe User *****************
     */
    
    /**
     * @var string $nom
     * 
     * @ORM\Column(name="nom", type="string", length=32, nullable=true)
     * @Assert\NotBlank()
     */
    protected $nom;
    
    /**
     * @var string $prenom
     *
     * @ORM\Column(name="prenom", type="string", length=32, nullable=true)
     */
    protected $prenom;
    
    /**
     * @var datetime $entreeEntreprise
     * 
     * @ORM\Column(name="entreeEntreprise", type="date", nullable=true)
     * @Assert\Date()
     */
    protected $entreeEntreprise;
    
    /**
     * @var float $congesPayes
     *
     * @ORM\Column(name="congesPayes", type="float", nullable=true)
     */
    protected $congesPayes;
    
    /**
     * @var float $cpPeriodePrec
     *
     * @ORM\Column(name="cpPeriodePrec", type="float", nullable=true)
     */
    protected $cpPeriodePrec;
    
    /**
     * @var float $cpReliquat
     *
     * @ORM\Column(name="cpReliquat", type="float", nullable=true)
     */
    protected $cpReliquat;
    
    /**
     * @var float $congesForfaites
     *
     * @ORM\Column(name="congesForfaites", type="float", nullable=true)
     */
    protected $congesForfaites;
    
    /**
     * @var float $hSup
     *
     * @ORM\Column(name="hSup", type="float", nullable=true)
     */
    protected $hSup;
    
    /**
     * @var float $hSupMaj
     *
     * @ORM\Column(name="hSupMaj", type="float", nullable=true)
     */
    protected $hSupMaj;
    
    /**
     * @var float $dep
     *
     * @ORM\Column(name="dep", type="float", nullable=true)
     */
    protected $dep;
    
    /**
     * @var float $depMaj
     *
     * @ORM\Column(name="depMaj", type="float", nullable=true)
     */
    protected $depMaj;
    
    /**
     * @var float $reposCompensatoires
     *
     * @ORM\Column(name="reposCompensatoires", type="float", nullable=true)
     */
    protected $reposCompensatoires;
    
    /**
     * @var float $rttEmployeur
     *
     * @ORM\Column(name="rttEmployeur", type="float", nullable=true)
     */
    protected $rttEmployeur;
    
    /**
     * @var float $rttSalarie
     *
     * @ORM\Column(name="rttSalarie", type="float", nullable=true)
     */
    protected $rttSalarie;
    
    /**
     * @var float $nbJourPresenceAnnee
     *
     * @ORM\Column(name="nbJourPresenceAnnee", type="float", nullable=true)
     */
    protected $nbJourPresenceAnnee;
    
    /**
     * @var float $nbJourPresenceAnneePrec
     *
     * @ORM\Column(name="nbJourPresenceAnneePrec", type="float", nullable=true)
     */
    protected $nbJourPresenceAnneePrec;
    
    /**
     * @var float $nbHAnnee
     *
     * @ORM\Column(name="nbHAnnee", type="float", nullable=true)
     */
    protected $nbHAnnee;
    
    /**
     * @var float $nbHAnneePrec
     *
     * @ORM\Column(name="nbHAnneePrec", type="float", nullable=true)
     */
    protected $nbHAnneePrec;
    
    /**
     * @var boolean $cadre
     *
     * @ORM\Column(name="cadre", type="boolean", nullable=true)
     */
    protected $cadre;
    
    
    /**
     * ***************** Contructeur de la classe User *****************
     */
    
    
    public function __construct()
    {
        parent::__construct();
        $this->entreeEntreprise = new \DateTime();
    }
    
    
    /**
     * ***************** Getter et Setter des attributs de la classe *****************
     */
    
    
    /**
     * Get nom
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
    
    /**
     * Set nom
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    
    /**
     * Get prenom
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    
    /**
     * Set prenom
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    
    /**
     * Get entreeEntreprise
     * @return \Datetime
     */
    public function getEntreeEntreprise()
    {
        return $this->entreeEntreprise;
    }
    
    /**
     * Set entreeEntreprise
     * @param \Datetime $entreeEntreprise
     */
    public function setEntreeEntreprise($entreeEntreprise)
    {
        $this->entreeEntreprise = $entreeEntreprise;
    }
    
    /**
     * Get congesPayes
     * @return float
     */
    public function getCongesPayes()
    {
        return $this->congesPayes;
    }
    
    /**
     * Set congesPayes
     * @param float $congesPayes
     */
    public function setCongesPayes($congesPayes)
    {
        $this->congesPayes = $congesPayes;
    }
    
    /**
     * Get cpPeriodePrec
     * @return float
     */
    public function getCpPeriodePrec()
    {
        return $this->cpPeriodePrec;
    }
    
    /**
     * Set cpPeriodePrec
     * @param float $cpPeriodePrec
     */
    public function setCpPeriodePrec($cpPeriodePrec)
    {
        $this->cpPeriodePrec = $cpPeriodePrec;
    }
    
    /**
     * Get cpReliquat
     * @return float
     */
    public function getCpReliquat()
    {
        return $this->cpReliquat;
    }
    
    /**
     * Set cpReliquat
     * @param float $cpReliquat
     */
    public function setCpReliquat($cpReliquat)
    {
        $this->cpReliquat = $cpReliquat;
    }
    
    /**
     * Get congesForfaites
     * @return float
     */
    public function getCongesForfaites()
    {
        return $this->congesForfaites;
    }
    
    /**
     * Set congesForfaites
     * @param float $congesForfaites
     */
    public function setCongesForfaites($congesForfaites)
    {
        $this->congesForfaites = $congesForfaites;
    }
    
    /**
     * Get hSup
     * @return float
     */
    public function getHSup()
    {
        return $this->hSup;
    }
    
    /**
     * Set hSup
     * @param float $hSup
     */
    public function setHSup($hSup)
    {
        $this->hSup = $hSup;
    }
    
    /**
     * Get hSupMaj
     * @return float
     */
    public function getHSupMaj()
    {
        return $this->hSupMaj;
    }
    
    /**
     * Set hSupMaj
     * @param float $hSupMaj
     */
    public function setHSupMaj($hSupMaj)
    {
        $this->hSupMaj = $hSupMaj;
    }
    
    /**
     * Get dep
     * @return float
     */
    public function getDep()
    {
        return $this->dep;
    }
    
    /**
     * Set dep
     * @param float $dep
     */
    public function setDep($dep)
    {
        $this->dep = $dep;
    }
    
    /**
     * Get depMaj
     * @return float
     */
    public function getDepMaj()
    {
        return $this->depMaj;
    }
    
    /**
     * Set depMaj
     * @param float $depMaj
     */
    public function setDepMaj($depMaj)
    {
        $this->depMaj = $depMaj;
    }
    
    /**
     * Get reposCompensatoires
     * @return float
     */
    public function getReposCompensatoires()
    {
        return $this->reposCompensatoires;
    }
    
    /**
     * Set reposCompensatoires
     * @param float $reposCompensatoires
     */
    public function setReposCompensatoires($reposCompensatoires)
    {
        $this->reposCompensatoires = $reposCompensatoires;
    }
    
    /**
     * Get rttEmployeur
     * @return float
     */
    public function getRttEmployeur()
    {
        return $this->rttEmployeur;
    }
    
    /**
     * Set rttEmployeur
     * @param float $rttEmployeur
     */
    public function setRttEmployeur($rttEmployeur)
    {
        $this->rttEmployeur = $rttEmployeur;
    }
    
    /**
     * Get rttSalarie
     * @return float
     */
    public function getRttSalarie()
    {
        return $this->rttSalarie;
    }
    
    /**
     * Set rttSalarie
     * @param float $rttSalarie
     */
    public function setRttSalarie($rttSalarie)
    {
        $this->rttSalarie = $rttSalarie;
    }
    
    /**
     * Get nbJourPresenceAnnee
     * @return float
     */
    public function getNbJourPresenceAnnee()
    {
        return $this->nbJourPresenceAnnee;
    }
    
    /**
     * Set nbJourPresenceAnnee
     * @param float $nbJourPresenceAnnee
     */
    public function setNbJourPresenceAnnee($nbJourPresenceAnnee)
    {
        $this->nbJourPresenceAnnee = $nbJourPresenceAnnee;
    }
    
    /**
     * Get nbJourPresenceAnneePrec
     * @return float
     */
    public function getNbJourPresenceAnneePrec()
    {
        return $this->nbJourPresenceAnneePrec;
    }
    
    /**
     * Set nbJourPresenceAnneePrec
     * @param float $nbJourPresenceAnneePrec
     */
    public function setNbJourPresenceAnneePrec($nbJourPresenceAnneePrec)
    {
        $this->nbJourPresenceAnneePrec = $nbJourPresenceAnneePrec;
    }
    
    /**
     * Get nbHAnnee
     * @return float
     */
    public function getNbHAnnee()
    {
        return $this->nbHAnnee;
    }
    
    /**
     * Set nbHAnnee
     * @param float $nbHAnnee
     */
    public function setNbHAnnee($nbHAnnee)
    {
        $this->nbHAnnee = $nbHAnnee;
    }
    
    /**
     * Get nbHAnneePrec
     * @return float
     */
    public function getNbHAnneePrec()
    {
        return $this->nbHAnneePrec;
    }
    
    /**
     * Set nbHAnneePrec
     * @param float $nbHAnneePrec
     */
    public function setNbHAnneePrec($nbHAnneePrec)
    {
        $this->nbHAnneePrec = $nbHAnneePrec;
    }
    
    /**
     * Get cadre
     * @return boolean
     */
    public function getCadre()
    {
        return $this->cadre;
    }
    
    /**
     * Set cadre
     * @param boolean $cadre
     */
    public function setCadre($cadre)
    {
        $this->cadre = $cadre;
    }
}
