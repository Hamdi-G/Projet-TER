<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CatchingRequest
 *
 * @ORM\Table(name="catching_request")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CatchingRequestRepository")
 */
class CatchingRequest
{
    /**
      * @ORM\ManyToOne(targetEntity="Absence")
      * @ORM\JoinColumn(nullable=false)
      */
      private $absence;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hour", type="time")
     */
    private $hour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var bool
     *
     * @ORM\Column(name="teacherdecision", type="boolean")
     */
    private $teacherdecision;

    /**
     * @var bool
     *
     * @ORM\Column(name="admindecision", type="boolean")
     */
    private $admindecision;


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
     * Set type
     *
     * @param integer $type
     * @return CatchingRequest
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set hour
     *
     * @param \DateTime $hour
     * @return CatchingRequest
     */
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * Get hour
     *
     * @return \DateTime
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return CatchingRequest
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set teacherdecision
     *
     * @param boolean $teacherdecision
     * @return CatchingRequest
     */
    public function setTeacherdecision($teacherdecision)
    {
        $this->teacherdecision = $teacherdecision;

        return $this;
    }

    /**
     * Get teacherdecision
     *
     * @return boolean
     */
    public function getTeacherdecision()
    {
        return $this->teacherdecision;
    }

    /**
     * Set admindecision
     *
     * @param boolean $admindecision
     * @return CatchingRequest
     */
    public function setAdmindecision($admindecision)
    {
        $this->admindecision = $admindecision;

        return $this;
    }

    /**
     * Get admindecision
     *
     * @return boolean
     */
    public function getAdmindecision()
    {
        return $this->admindecision;
    }

    /**
     * Set absence
     *
     * @param \AppBundle\Entity\Absence $absence
     * @return CatchingRequest
     */
    public function setAbsence(\AppBundle\Entity\Absence $absence)
    {
        $this->absence = $absence;

        return $this;
    }

    /**
     * Get absence
     *
     * @return \AppBundle\Entity\Absence
     */
    public function getAbsence()
    {
        return $this->absence;
    }
}
