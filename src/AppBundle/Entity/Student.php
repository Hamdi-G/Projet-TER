<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Student
*
* @ORM\Table(name="student")
* @ORM\Entity(repositoryClass="AppBundle\Repository\StudentRepository")
*/
class Student
{
  /**
  * @ORM\ManyToOne(targetEntity="Labgroup")
  * @ORM\JoinColumn(nullable=false)
  */
  private $labgroup;

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
  * @ORM\Column(name="firstname", type="string", length=255)
  */
  private $firstname;

  /**
  * @var string
  *
  * @ORM\Column(name="lastname", type="string", length=255)
  */
  private $lastname;

  /**
  * @var \DateTime
  *
  * @ORM\Column(name="birthdate", type="date")
  */
  private $birthdate;

  /**
  * @var string
  *
  * @ORM\Column(name="highschool", type="string", length=255)
  */
  private $highschool;

  /**
  * @var string
  *
  * @ORM\Column(name="bac", type="string", length=255)
  */
  private $bac;

  /**
  * @var string
  *
  * @ORM\Column(name="privatemail", type="string", length=255)
  */
  private $privatemail;

  /**
  * @var string
  *
  * @ORM\Column(name="unsmail", type="string", length=255)
  */
  private $unsmail;

  /**
  * @var int
  *
  * @ORM\Column(name="privatenum", type="integer")
  */
  private $privatenum;

  /**
  * @var int
  *
  * @ORM\Column(name="parentnum", type="integer")
  */
  private $parentnum;

  /**
  * @var string
  *
  * @ORM\Column(name="privateadr", type="string", length=255)
  */
  private $privateadr;

  /**
  * @var string
  *
  * @ORM\Column(name="parentadr", type="string", length=255)
  */
  private $parentadr;

  /**
  * @var string
  *
  * @ORM\Column(name="login", type="string", length=255)
  */
  private $login;

  /**
  * @var string
  *
  * @ORM\Column(name="passwd", type="string", length=255)
  */
  private $passwd;

  /**
  * @var string
  *
  * @ORM\Column(name="photo", type="string", length=255)
  */
  private $photo;


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
  * Set firstname
  *
  * @param string $firstname
  * @return Student
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
  * @return Student
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

  /**
  * Set birthdate
  *
  * @param \DateTime $birthdate
  * @return Student
  */
  public function setBirthdate($birthdate)
  {
    $this->birthdate = $birthdate;

    return $this;
  }

  /**
  * Get birthdate
  *
  * @return \DateTime
  */
  public function getBirthdate()
  {
    return $this->birthdate;
  }

  /**
  * Set highschool
  *
  * @param string $highschool
  * @return Student
  */
  public function setHighschool($highschool)
  {
    $this->highschool = $highschool;

    return $this;
  }

  /**
  * Get highschool
  *
  * @return string
  */
  public function getHighschool()
  {
    return $this->highschool;
  }

  /**
  * Set bac
  *
  * @param string $bac
  * @return Student
  */
  public function setBac($bac)
  {
    $this->bac = $bac;

    return $this;
  }

  /**
  * Get bac
  *
  * @return string
  */
  public function getBac()
  {
    return $this->bac;
  }

  /**
  * Set privatemail
  *
  * @param string $privatemail
  * @return Student
  */
  public function setPrivatemail($privatemail)
  {
    $this->privatemail = $privatemail;

    return $this;
  }

  /**
  * Get privatemail
  *
  * @return string
  */
  public function getPrivatemail()
  {
    return $this->privatemail;
  }

  /**
  * Set unsmail
  *
  * @param string $unsmail
  * @return Student
  */
  public function setUnsmail($unsmail)
  {
    $this->unsmail = $unsmail;

    return $this;
  }

  /**
  * Get unsmail
  *
  * @return string
  */
  public function getUnsmail()
  {
    return $this->unsmail;
  }

  /**
  * Set privatenum
  *
  * @param string $privatenum
  * @return Student
  */
  public function setPrivatenum($privatenum)
  {
    $this->privatenum = $privatenum;

    return $this;
  }

  /**
  * Get privatenum
  *
  * @return string
  */
  public function getPrivatenum()
  {
    return $this->privatenum;
  }

  /**
  * Set parentnum
  *
  * @param integer $parentnum
  * @return Student
  */
  public function setParentnum($parentnum)
  {
    $this->parentnum = $parentnum;

    return $this;
  }

  /**
  * Get parentnum
  *
  * @return integer
  */
  public function getParentnum()
  {
    return $this->parentnum;
  }

  /**
  * Set privateadr
  *
  * @param string $privateadr
  * @return Student
  */
  public function setPrivateadr($privateadr)
  {
    $this->privateadr = $privateadr;

    return $this;
  }

  /**
  * Get privateadr
  *
  * @return string
  */
  public function getPrivateadr()
  {
    return $this->privateadr;
  }

  /**
  * Set parentadr
  *
  * @param string $parentadr
  * @return Student
  */
  public function setParentadr($parentadr)
  {
    $this->parentadr = $parentadr;

    return $this;
  }

  /**
  * Get parentadr
  *
  * @return string
  */
  public function getParentadr()
  {
    return $this->parentadr;
  }

  /**
  * Set login
  *
  * @param string $login
  * @return Student
  */
  public function setLogin($login)
  {
    $this->login = $login;

    return $this;
  }

  /**
  * Get login
  *
  * @return string
  */
  public function getLogin()
  {
    return $this->login;
  }

  /**
  * Set passwd
  *
  * @param string $passwd
  * @return Student
  */
  public function setPasswd($passwd)
  {
    $this->passwd = $passwd;

    return $this;
  }

  /**
  * Get passwd
  *
  * @return string
  */
  public function getPasswd()
  {
    return $this->passwd;
  }

  /**
  * Set photo
  *
  * @param string $photo
  * @return Student
  */
  public function setPhoto($photo)
  {
    $this->photo = $photo;

    return $this;
  }

  /**
  * Get photo
  *
  * @return string
  */
  public function getPhoto()
  {
    return $this->photo;
  }

    /**
     * Set labgroup
     *
     * @param \AppBundle\Entity\Labgroup $labgroup
     * @return Student
     */
    public function setLabgroup(\AppBundle\Entity\Labgroup $labgroup)
    {
        $this->labgroup = $labgroup;

        return $this;
    }

    /**
     * Get labgroup
     *
     * @return \AppBundle\Entity\Labgroup
     */
    public function getLabgroup()
    {
        return $this->labgroup;
    }
}
