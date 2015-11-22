<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grade
 */
class Grade
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $grade;

    /**
     * @var string
     */
    private $comment;


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
     * Set grade
     *
     * @param integer $grade
     * @return Grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return integer 
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Grade
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }
    /**
     * @var \AppBundle\Entity\User
     */
    private $user;

    /**
     * @var \AppBundle\Entity\Lesson
     */
    private $lesson;


    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Grade
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set lesson
     *
     * @param \AppBundle\Entity\Lesson $lesson
     * @return Grade
     */
    public function setLesson(\AppBundle\Entity\Lesson $lesson)
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
}
