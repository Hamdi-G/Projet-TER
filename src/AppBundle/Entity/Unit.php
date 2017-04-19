<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Unit
*
* @ORM\Table(name="unit")
* @ORM\Entity(repositoryClass="AppBundle\Repository\UnitRepository")
*/
class Unit
{

  /**
  * @ORM\ManyToOne(targetEntity="Semester")
  * @ORM\JoinColumn(nullable=false)
  */
  private $semester;
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
  * @return Unit
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
     * Set semester
     *
     * @param \AppBundle\Entity\Semester $semester
     * @return Unit
     */
    public function setSemester(\AppBundle\Entity\Semester $semester)
    {
        $this->semester = $semester;

        return $this;
    }

    /**
     * Get semester
     *
     * @return \AppBundle\Entity\Semester 
     */
    public function getSemester()
    {
        return $this->semester;
    }
}
