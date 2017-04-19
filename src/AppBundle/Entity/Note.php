<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Note
*
* @ORM\Table(name="note")
* @ORM\Entity(repositoryClass="AppBundle\Repository\NoteRepository")
*/
class Note
{
  /**
  * @ORM\ManyToOne(targetEntity="Module")
  * @ORM\JoinColumn(nullable=false)
  */
  private $module;
  /**
  * @ORM\ManyToOne(targetEntity="Student")
  * @ORM\JoinColumn(nullable=false)
  */
  private $student;
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
  * @ORM\Column(name="note", type="decimal", precision=10, scale=0)
  */
  private $note;


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
  * Set note
  *
  * @param string $note
  * @return Note
  */
  public function setNote($note)
  {
    $this->note = $note;

    return $this;
  }

  /**
  * Get note
  *
  * @return string
  */
  public function getNote()
  {
    return $this->note;
  }

  /**
  * Set module
  *
  * @param \AppBundle\Entity\Module $module
  * @return Note
  */
  public function setModule(\AppBundle\Entity\Module $module)
  {
    $this->module = $module;

    return $this;
  }

  /**
  * Get module
  *
  * @return \AppBundle\Entity\Module
  */
  public function getModule()
  {
    return $this->module;
  }

    /**
     * Set student
     *
     * @param \AppBundle\Entity\Student $student
     * @return Note
     */
    public function setStudent(\AppBundle\Entity\Student $student)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \AppBundle\Entity\Student
     */
    public function getStudent()
    {
        return $this->student;
    }
}
