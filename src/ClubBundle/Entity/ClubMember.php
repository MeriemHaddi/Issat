<?php

namespace ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClubMember
 *
 * @ORM\Table(name="club_member")
 * @ORM\Entity(repositoryClass="ClubBundle\Repository\ClubMemberRepository")
 */
class ClubMember
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
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;


    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User" , inversedBy="id")
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity="ClubBundle\Entity\Club" , inversedBy="id")
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
     * Set role
     *
     * @param string $role
     *
     * @return ClubMember
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set student
     *
     * @param \UserBundle\Entity\Student $student
     *
     * @return ClubMember
     */
    public function setStudent(\UserBundle\Entity\Student $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \UserBundle\Entity\Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set club
     *
     * @param \ClubBundle\Entity\Club $club
     *
     * @return ClubMember
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
