<?php

namespace Rh\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="rh_user")
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
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string $nom
     * 
     * @ORM\Column(name="nom", type="string", length=32)
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
     * @ORM\Column(name="entreeEntreprise", type="datetime", nullable=true)
     * @Assert\DateTime()
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
     * @ORM\Column(name="cadre", type="boolean")
     */
    protected $cadre;
    
    
    /**
     * Contructeur de la classe User
     */
    public function __construct()
    {
        parent::__construct();
    }
}