<?php

namespace ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participation
 *
 * @ORM\Table(name="participation")
 * @ORM\Entity(repositoryClass="ClubBundle\Repository\ParticipationRepository")
 */
class Participation
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
     * @ORM\ManyToOne(targetEntity="ClubBundle\Entity\Event" , inversedBy="id")
     */
    private $event;


    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User" , inversedBy="id")
     */
    private $etudiant;


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
     * Set event
     *
     * @param \ClubBundle\Entity\Event $event
     *
     * @return Participation
     */
    public function setEvent(\ClubBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \ClubBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set etudiant
     *
     * @param \UserBundle\Entity\Student $etudiant
     *
     * @return Participation
     */
    public function setEtudiant(\UserBundle\Entity\Student $etudiant = null)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \UserBundle\Entity\User
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }
}
