<?php

namespace DepartementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Library
 *
 * @ORM\Table(name="library")
 * @ORM\Entity(repositoryClass="DepartementBundle\Repository\LibraryRepository")
 */
class Library
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="string", length=255)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="autherName", type="string", length=255)
     */
    private $autherName;

    /**
     * @var string
     *
     * @ORM\Column(name="publisher", type="string", length=255)
     */
    private $publisher;

    /**
     * @var string
     *
     * @ORM\Column(name="assetDetails", type="string", length=1000)
     */
    private $assetDetails;

    /**
     * @ORM\ManyToOne(targetEntity="DepartementBundle\Entity\Departement" , inversedBy="id")
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
     * Set title
     *
     * @param string $title
     *
     * @return Library
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return Library
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set year
     *
     * @param string $year
     *
     * @return Library
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Library
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Library
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set autherName
     *
     * @param string $autherName
     *
     * @return Library
     */
    public function setAutherName($autherName)
    {
        $this->autherName = $autherName;

        return $this;
    }

    /**
     * Get autherName
     *
     * @return string
     */
    public function getAutherName()
    {
        return $this->autherName;
    }

    /**
     * Set publisher
     *
     * @param string $publisher
     *
     * @return Library
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set assetDetails
     *
     * @param string $assetDetails
     *
     * @return Library
     */
    public function setAssetDetails($assetDetails)
    {
        $this->assetDetails = $assetDetails;

        return $this;
    }

    /**
     * Get assetDetails
     *
     * @return string
     */
    public function getAssetDetails()
    {
        return $this->assetDetails;
    }

    /**
     * Set departement
     *
     * @param \DepartementBundle\Entity\Departement $departement
     *
     * @return Library
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
