<?php

namespace DepartementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity(repositoryClass="DepartementBundle\Repository\CourseRepository")
 * @Vich\Uploadable

 */
class Course
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
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=10000)
     */
    private $description;


    /**
     * @ORM\Column(type="string")
     */
    private  $startingDate;


    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="upload_image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\OneToMany(targetEntity="DepartementBundle\Entity\Course" ,  mappedBy="planningCourse")
     */
    private $planningCourse;

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }


    /**
     * @return mixed
     */
    public function getStartingDate()
    {
        return $this->startingDate;
    }

    /**
     * @param mixed $startingDate
     */
    public function setStartingDate($startingDate)
    {
        $this->startingDate = $startingDate;
    }
    /**
     * @return mixed
     */




    /**
     * @ORM\Column(type="string")
     */
    private $duration;
    

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
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
     * Set name
     *
     * @param string $name
     *
     * @return Course
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
     * Set code
     *
     * @param string $code
     *
     * @return Course
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Course
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
     * Set professors
     *
     * @param \UserBundle\Entity\User $professors
     *
     * @return Course
     */
    public function setProfessors(\UserBundle\Entity\User $professors = null)
    {
        $this->professors = $professors;

        return $this;
    }

    /**
     * Get professors
     *
     * @return \UserBundle\Entity\User
     */
    public function getProfessors()
    {
        return $this->professors;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->planningCourse = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add planningCourse
     *
     * @param \DepartementBundle\Entity\Course $planningCourse
     *
     * @return Course
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
