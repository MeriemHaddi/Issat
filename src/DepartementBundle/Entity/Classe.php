<?php

namespace DepartementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class
 *
 * @ORM\Table(name="class")
 * @ORM\Entity(repositoryClass="DepartementBundle\Repository\ClassRepository")
 */
class Classe
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
     * @var int
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     *
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\User" , mappedBy="id")
     */
    private $user;

    /**
     *
     * @ORM\OneToMany(targetEntity="DepartementBundle\Entity\Course" , mappedBy="planningCourse")
     */
    private $planningCourse;

    /**
     * @ORM\ManyToOne(targetEntity="DepartementBundle\Entity\Departement" , inversedBy="classes")
     */
    private $departement;
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
     * @return Classe
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
     * Set capacity
     *
     * @param integer $capacity
     *
     * @return Classe
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
        $this->planningCourse = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Classe
     */
    public function addUser(\UserBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \UserBundle\Entity\User $user
     */
    public function removeUser(\UserBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add planningCourse
     *
     * @param \DepartementBundle\Entity\Course $planningCourse
     *
     * @return Classe
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

    /**
     * Set departement
     *
     * @param \DepartementBundle\Entity\Departement $departement
     *
     * @return Classe
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
    public function getDepartement()
    {
        return $this->departement;
    }
}
