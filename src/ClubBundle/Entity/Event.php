<?php

namespace ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="ClubBundle\Repository\EventRepository")
 */
class Event
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
     * @var \DateTime
     *
     * @ORM\Column(name="startingDate", type="datetime")
     */
    private $startingDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endingDate", type="datetime")
     */
    private $endingDate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="ClubBundle\Entity\Participation" , mappedBy="event")
     */
    private $listParticipation;


    /**
     * @ORM\ManyToOne(targetEntity="ClubBundle\Entity\Club" , inversedBy="events")
     */
    private $club;

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
     * @return Event
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
     * @param \DateTime $startingDate
     *
     * @return Event
     */
    public function setStartingDate($startingDate)
    {
        $this->startingDate = $startingDate;

        return $this;
    }

    /**
     * Get startingDate
     *
     * @return \DateTime
     */
    public function getStartingDate()
    {
        return $this->startingDate;
    }

    /**
     * Set endingDate
     *
     * @param \DateTime $endingDate
     *
     * @return Event
     */
    public function setEndingDate($endingDate)
    {
        $this->endingDate = $endingDate;

        return $this;
    }

    /**
     * Get endingDate
     *
     * @return \DateTime
     */
    public function getEndingDate()
    {
        return $this->endingDate;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Event
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
        $this->listParticipation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add listParticipation
     *
     * @param \ClubBundle\Entity\Participation $listParticipation
     *
     * @return Event
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
     * Set club
     *
     * @param \ClubBundle\Entity\Club $club
     *
     * @return Event
     */
    public function setClub(\ClubBundle\Entity\Club $club = null)
    {
        $this->club = $club;

        return $this;
    }

    /**
     * Get club
     *
     * @return \ClubBundle\Entity\Club
     */
    public function getClub()
    {
        return $this->club;
    }
}
