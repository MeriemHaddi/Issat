<?php

namespace DepartementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="departement")
 * @ORM\Entity(repositoryClass="DepartementBundle\Repository\DepartementRepository")
 */
class Departement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="startingDate", type="string", length=255)
     */
    private $startingDate;

    /**
     * @var string
     *
     * @ORM\Column(name="capacity", type="string", length=255)
     */
    private $capacity;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\User" , inversedBy="departement" )
     */
    private $head;

    /**
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\User" , mappedBy="departement")
     */
    private $teachers;

    /**
     * @ORM\OneToMany(targetEntity="DepartementBundle\Entity\Classe" ,  mappedBy="departement")
     */
    private $classes;

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
     * Set name
     *
     * @param string $name
     *
     * @return Departement
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set startingDate
     *
     * @param string $startingDate
     *
     * @return Departement
     */
    public function setStartingDate($startingDate)
    {
        $this->startingDate = $startingDate;

        return $this;
    }

    /**
     * Get startingDate
     *
     * @return string
     */
    public function getStartingDate()
    {
        return $this->startingDate;
    }

    /**
     * Set capacity
     *
     * @param string $capacity
     *
     * @return Departement
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return string
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Departement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


  

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->teachers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add teacher
     *
     * @param \UserBundle\Entity\User $teacher
     *
     * @return Departement
     */
    public function addTeacher(\UserBundle\Entity\User $teacher)
    {
        $this->teachers[] = $teacher;

        return $this;
    }

    /**
     * Remove teacher
     *
     * @param \UserBundle\Entity\User $teacher
     */
    public function removeTeacher(\UserBundle\Entity\User $teacher)
    {
        $this->teachers->removeElement($teacher);
    }

    /**
     * Get teachers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeachers()
    {
        return $this->teachers;
    }

    /**
     * Set head
     *
     * @param \UserBundle\Entity\User $head
     *
     * @return Departement
     */
    public function setHead(\UserBundle\Entity\User $head = null)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * Get head
     *
     * @return \UserBundle\Entity\User
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * Add class
     *
     * @param \DepartementBundle\Entity\Classe $class
     *
     * @return Departement
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
     * Get classes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClasses()
    {
        return $this->classes;
    }
}
