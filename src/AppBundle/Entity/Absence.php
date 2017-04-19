<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Absence
*
* @ORM\Table(name="absence")
* @ORM\Entity(repositoryClass="AppBundle\Repository\AbsenceRepository")
*/
class Absence
{
  /**
  * @ORM\ManyToOne(targetEntity="Student")
  * @ORM\JoinColumn(nullable=false)
  */
  private $student;
  /**
  * @ORM\ManyToOne(targetEntity="Module")
  * @ORM\JoinColumn(nullable=false)
  */
  private $module;
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
  * @ORM\Column(name="starth", type="time")
  */
  private $starth;

  /**
  * @var \DateTime
  *
  * @ORM\Column(name="endh", type="time")
  */
  private $endh;

  /**
  * @var \DateTime
  *
  * @ORM\Column(name="startd", type="date")
  */
  private $startd;

  /**
  * @var \DateTime
  *
  * @ORM\Column(name="endd", type="date")
  */
  private $endd;

  /**
  * @var string
  *
  * @ORM\Column(name="reason", type="text")
  */
  private $reason;

  /**
  * @var int
  *
  * @ORM\Column(name="state", type="integer")
  */
  private $state;


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
  * Set starth
  *
  * @param \DateTime $starth
  * @return Absence
  */
  public function setStarth($starth)
  {
    $this->starth = $starth;

    return $this;
  }

  /**
  * Get starth
  *
  * @return \DateTime
  */
  public function getStarth()
  {
    return $this->starth;
  }

  /**
  * Set endh
  *
  * @param string $endh
  * @return Absence
  */
  public function setEndh($endh)
  {
    $this->endh = $endh;

    return $this;
  }

  /**
  * Get endh
  *
  * @return string
  */
  public function getEndh()
  {
    return $this->endh;
  }

  /**
  * Set startd
  *
  * @param string $startd
  * @return Absence
  */
  public function setStartd($startd)
  {
    $this->startd = $startd;

    return $this;
  }

  /**
  * Get startd
  *
  * @return string
  */
  public function getStartd()
  {
    return $this->startd;
  }

  /**
  * Set endd
  *
  * @param \DateTime $endd
  * @return Absence
  */
  public function setEndd($endd)
  {
    $this->endd = $endd;

    return $this;
  }

  /**
  * Get endd
  *
  * @return \DateTime
  */
  public function getEndd()
  {
    return $this->endd;
  }

  /**
  * Set reason
  *
  * @param string $reason
  * @return Absence
  */
  public function setReason($reason)
  {
    $this->reason = $reason;

    return $this;
  }

  /**
  * Get reason
  *
  * @return string
  */
  public function getReason()
  {
    return $this->reason;
  }

  /**
  * Set state
  *
  * @param integer $state
  * @return Absence
  */
  public function setState($state)
  {
    $this->state = $state;

    return $this;
  }

  /**
  * Get state
  *
  * @return integer
  */
  public function getState()
  {
    return $this->state;
  }

    /**
     * Set student
     *
     * @param \AppBundle\Entity\Student $student
     * @return Absence
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

    /**
     * Set module
     *
     * @param \AppBundle\Entity\Module $module
     * @return Absence
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
}
