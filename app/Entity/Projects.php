<?php


namespace app\Entity;


use DateTimeZone;

class Projects
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $createAt;

    /**
     * @var \DateTime
     */
    private $modifiedAt;

    /**
     * @var int
     */
    private $user;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var array Lists
     */
    private $lists;

    /**
     * @var array Users
     */
    private  $guest;

    public function __construct()
    {
        $this->lists = [];
        $this->guest = [];
        $this->createAt = new \DateTime('now');
        $this->modifiedAt = new \DateTime('now');
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Projects
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Projects
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Projects
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return DateTimeZone
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * @param DateTimeZone $createAt
     * @return Projects
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
        return $this;
    }

    /**
     * @return array
     */
    public function getLists()
    {
        return $this->lists;
    }

    /**
     * @param array $lists
     * @return Projects
     */
    public function setLists($lists)
    {
        $this->lists = $lists;
        return $this;
    }

    /**
     * @return array
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * @param arra $guest
     * @return Projects
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;
        return $this;
    }

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     * @return Projects
     */
    public function setPicture(string $picture): Projects
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getModifiedAt(): \DateTime
    {
        return $this->modifiedAt;
    }

    /**
     * @param \DateTime $modifiedAt
     * @return Projects
     */
    public function setModifiedAt(\DateTime $modifiedAt): Projects
    {
        $this->modifiedAt = $modifiedAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getUser(): int
    {
        return $this->user;
    }

    /**
     * @param int $user
     * @return Projects
     */
    public function setUser(int $user): Projects
    {
        $this->user = $user;
        return $this;
    }



}