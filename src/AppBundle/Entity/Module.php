<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Module
*
* @ORM\Table(name="module")
* @ORM\Entity(repositoryClass="AppBundle\Repository\ModuleRepository")
*/
class Module
{
  /**
  * @ORM\ManyToMany(targetEntity="Teacher", cascade={"persist"})
  */
  private $teachers;
  
  /**
  * @ORM\ManyToOne(targetEntity="Unit")
  * @ORM\JoinColumn(nullable=false)
  */
  private $unit;

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
  * @var int
  *
  * @ORM\Column(name="coeff", type="integer")
  */
  private $coeff;


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
  * Set name
  *
  * @param string $name
  * @return Module
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
  * Set coeff
  *
  * @param integer $coeff
  * @return Module
  */
  public function setCoeff($coeff)
  {
    $this->coeff = $coeff;

    return $this;
  }

  /**
  * Get coeff
  *
  * @return integer
  */
  public function getCoeff()
  {
    return $this->coeff;
  }

  /**
  * Set unit
  *
  * @param \AppBundle\Entity\Unit $unit
  * @return Module
  */
  public function setUnit(\AppBundle\Entity\Unit $unit)
  {
    $this->unit = $unit;

    return $this;
  }

  /**
  * Get unit
  *
  * @return \AppBundle\Entity\Unit
  */
  public function getUnit()
  {
    return $this->unit;
  }
  /**
  * Constructor
  */
  public function __construct()
  {
    $this->teachers = new \Doctrine\Common\Collections\ArrayCollection();
  }

  /**
  * Add teachers
  *
  * @param \AppBundle\Entity\Teacher $teachers
  * @return Module
  */
  public function addTeacher(\AppBundle\Entity\Teacher $teachers)
  {
    $this->teachers[] = $teachers;

    return $this;
  }

  /**
  * Remove teachers
  *
  * @param \AppBundle\Entity\Teacher $teachers
  */
  public function removeTeacher(\AppBundle\Entity\Teacher $teachers)
  {
    $this->teachers->removeElement($teachers);
  }

  /**
  * Get teachers
  *
  * @return \Doctrine\Common\Collections\Collection
  */
  public function getTeachers()
  {
    return $this->teachers;
  }
}
