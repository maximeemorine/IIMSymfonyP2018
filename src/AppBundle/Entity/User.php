<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
    * @Assert\NotBlank()
    * @Assert\Length(max = 4096)
    */
    private $plainPassword;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $isActive;


    public function __construct()
    {
        $this->isActive = true;
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid(null, true));
    }

    public function getFullname()
    {
        return $this->firstname.' '.$this->lastname.' <'.$this->email.'>';
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }


    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $grade;


    /**
     * Add grade
     *
     * @param \AppBundle\Entity\Grade $grade
     * @return User
     */
    public function addGrade(\AppBundle\Entity\Grade $grade)
    {
        $this->grade[] = $grade;

        return $this;
    }

    /**
     * Remove grade
     *
     * @param \AppBundle\Entity\Grade $grade
     */
    public function removeGrade(\AppBundle\Entity\Grade $grade)
    {
        $this->grade->removeElement($grade);
    }

    /**
     * Get grade
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGrade()
    {
        return $this->grade;
    }
    /**
     * @var \AppBundle\Entity\Lesson
     */
    private $lesson;


    /**
     * Set lesson
     *
     * @param \AppBundle\Entity\Lesson $lesson
     * @return User
     */
    public function setLesson(\AppBundle\Entity\Lesson $lesson = null)
    {
        $this->lesson = $lesson;

        return $this;
    }

    /**
     * Get lesson
     *
     * @return \AppBundle\Entity\Lesson
     */
    public function getLesson()
    {
        return $this->lesson;
    }
    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;


    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }
}
