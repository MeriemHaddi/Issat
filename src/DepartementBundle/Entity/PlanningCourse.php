<?php

namespace DepartementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaningCourse
 *
 * @ORM\Table(name="planing_course")
 * @ORM\Entity(repositoryClass="DepartementBundle\Repository\PlaningCourseRepository")
 */
class PlanningCourse
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateTime", type="datetime")
     */
    private $dateTime;

    /**
     * @var float
     *
     * @ORM\Column(name="duration", type="float")
     */
    private $duration;

    /**
     * @ORM\ManyToOne(targetEntity="DepartementBundle\Entity\Course" , inversedBy="planningCourse")
     */
    private $courses;

    /**
     * @ORM\ManyToOne(targetEntity="DepartementBundle\Entity\Classe" , inversedBy="planningCourse")
     */
    private $classes;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User" , inversedBy="id")
     */
    private $teachers;

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
     * Set dateTime
     *
     * @param \DateTime $dateTime
     *
     * @return PlanningCourse
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set duration
     *
     * @param float $duration
     *
     * @return PlanningCourse
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return float
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set courses
     *
     * @param \DepartementBundle\Entity\Course $courses
     *
     * @return PlanningCourse
     */
    public function setCourses(\DepartementBundle\Entity\Course $courses = null)
    {
        $this->courses = $courses;

        return $this;
    }

    /**
     * Get courses
     *
     * @return \DepartementBundle\Entity\Course
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Set classes
     *
     * @param \DepartementBundle\Entity\Classe $classes
     *
     * @return PlanningCourse
     */
    public function setClasses(\DepartementBundle\Entity\Classe $classes = null)
    {
        $this->classes = $classes;

        return $this;
    }

    /**
     * Get classes
     *
     * @return \DepartementBundle\Entity\Classe
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * Set teachers
     *
     * @param \UserBundle\Entity\User $teachers
     *
     * @return PlanningCourse
     */
    public function setTeachers(\UserBundle\Entity\User $teachers = null)
    {
        $this->teachers = $teachers;

        return $this;
    }

    /**
     * Get teachers
     *
     * @return \UserBundle\Entity\User
     */
    public function getTeachers()
    {
        return $this->teachers;
    }
}
