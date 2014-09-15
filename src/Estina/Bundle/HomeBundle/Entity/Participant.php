<?php

namespace Estina\Bundle\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participant
 *
 * @ORM\Entity()
 * @ORM\Table(name="participant")
 * @ORM\HasLifecycleCallbacks
 */
class Participant
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="motivation", type="text")
     */
    private $motivation;

    /**
     * @var string
     *
     * @ORM\Column(name="participant", type="string", length=255)
     */
    private $participant;
    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string", length=255)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_on", type="datetime")
     */
    private $createdOn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="wishes", type="text")
     */
    private $wishes;


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
     * @param string $motivation
     */
    public function setMotivation($motivation)
    {
        $this->motivation = $motivation;
    }

    /**
     * @return string
     */
    public function getMotivation()
    {
        return $this->motivation;
    }

    /**
     * @param string $participant
     */
    public function setParticipant($participant)
    {
        $this->participant = $participant;
    }

    /**
     * @return string
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * Set email
     *
     * @param $email
     * @return $this
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
     * Set phone
     * 
     * @param $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Participant
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set createdOn
     *
     * @param \DateTime $createdOn
     * @return Participant
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * Get createdOn
     *
     * @return \DateTime 
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Participant
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set active
     *
     * @param bool $active
     * @return Participant
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @ORM\PreFlush 
     */
    public function preFlush()
    {
        if ($this->id) {
            $this->updatedAt = new \DateTime;
        } else {
            $this->createdOn = new \DateTime;
        }
    }

    /**
     * setWishes 
     * 
     * @param string $data 
     *
     * @return Participant
     */
    public function setWishes($data)
    {
        $this->wishes = $data;

        return $this;
    }

    /**
     * getWishes 
     * 
     * @return string
     */
    public function getWishes()
    {
        return $this->wishes;
    }
}
