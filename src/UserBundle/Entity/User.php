<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $address="";

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=255, nullable=true)
     */
    private $cin;

    /**
     * @ORM\Column(type="string"  , nullable=true)
     */
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(name="charge_id", type="string", length=255, nullable=true)
     */
    protected $chargeId;

    /**
     * @ORM\ManyToOne(targetEntity="DepartementBundle\Entity\Classe" , inversedBy="id")
     */
    private $classe;

    /**
     * @ORM\OneToMany(targetEntity="ClubBundle\Entity\Club" , mappedBy="id")
     *
     */
    private $memberClub;

    /**
     * @ORM\OneToMany(targetEntity="ClubBundle\Entity\Participation" ,  mappedBy="etudiant")
     */
    private $listParticipation;



    /**
     * @ORM\OneToMany(targetEntity="DepartementBundle\Entity\Course" , mappedBy="planningCourse")
     * 
     */
    private $planningCourse;

    /**
     * @ORM\ManyToOne(targetEntity="DepartementBundle\Entity\Departement" , inversedBy="teachers"  )
     * @ORM\JoinColumn(name="departement_id", referencedColumnName="id",onDelete="CASCADE")
     *
     */
    private $departement;

    /**
     * Set classe
     *
     * @param \DepartementBundle\Entity\Classe $classe
     *
     * @return User
     */
    public function setClasse(\DepartementBundle\Entity\Classe $classe = null)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return \DepartementBundle\Entity\Classe
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Add memberClub
     *
     * @param \ClubBundle\Entity\Club $memberClub
     *
     * @return User
     */
    public function addMemberClub(\ClubBundle\Entity\Club $memberClub)
    {
        $this->memberClub[] = $memberClub;

        return $this;
    }

    /**
     * Remove memberClub
     *
     * @param \ClubBundle\Entity\Club $memberClub
     */
    public function removeMemberClub(\ClubBundle\Entity\Club $memberClub)
    {
        $this->memberClub->removeElement($memberClub);
    }

    /**
     * Get memberClub
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMemberClub()
    {
        return $this->memberClub;
    }

    /**
     * Add listParticipation
     *
     * @param \ClubBundle\Entity\Participation $listParticipation
     *
     * @return User
     */
    public function addListParticipation(\ClubBundle\Entity\Participation $listParticipation)
    {
        $this->listParticipation[] = $listParticipation;

        return $this;
    }

    /**
     * Remove listParticipation
     *
     * @param \ClubBundle\Entity\Participation $listParticipation
     */
    public function removeListParticipation(\ClubBundle\Entity\Participation $listParticipation)
    {
        $this->listParticipation->removeElement($listParticipation);
    }

    /**
     * Get listParticipation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListParticipation()
    {
        return $this->listParticipation;
    }

    /**
     * @return mixed
     */
    public function getChargeId()
    {
        return $this->chargeId;
    }

    /**
     * @param mixed $chargeId
     */
    public function setChargeId($chargeId)
    {
        $this->chargeId = $chargeId;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }



    /**
     * Set cin
     *
     * @param string $cin
     *
     * @return User
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    public function setSalt($salt)
    {
        $this->salt = null;
        return $this->salt;
    }

    public function __construct()
    {
        parent::__construct();
        $this->salt = null;
        // your own logic
    }

    /**
     * Set departement
     *
     * @param \DepartementBundle\Entity\Departement $departement
     *
     * @return User
     */
    public function setDepartement(\DepartementBundle\Entity\Departement $departement = null)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return \DepartementBundle\Entity\Departement
     */
    public function getdepartement()
    {
        return $this->departement;
    }



    /**
     * Add class
     *
     * @param \DepartementBundle\Entity\Classe $class
     *
     * @return User
     */
    public function addClass(\DepartementBundle\Entity\Classe $class)
    {
        $this->classes[] = $class;

        return $this;
    }

    /**
     * Remove class
     *
     * @param \DepartementBundle\Entity\Classe $class
     */
    public function removeClass(\DepartementBundle\Entity\Classe $class)
    {
        $this->classes->removeElement($class);
    }



    /**
     * Set classes
     *
     * @param \DepartementBundle\Entity\Classe $classes
     *
     * @return User
     */
    public function setClasses(\DepartementBundle\Entity\Classe $classes = null)
    {
        $this->classes = $classes;

        return $this;
    }

    /**
     * Add planningCourse
     *
     * @param \DepartementBundle\Entity\Course $planningCourse
     *
     * @return User
     */
    public function addPlanningCourse(\DepartementBundle\Entity\Course $planningCourse)
    {
        $this->planningCourse[] = $planningCourse;

        return $this;
    }

    /**
     * Remove planningCourse
     *
     * @param \DepartementBundle\Entity\Course $planningCourse
     */
    public function removePlanningCourse(\DepartementBundle\Entity\Course $planningCourse)
    {
        $this->planningCourse->removeElement($planningCourse);
    }

    /**
     * Get planningCourse
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlanningCourse()
    {
        return $this->planningCourse;
    }
}
