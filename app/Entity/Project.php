<?php


namespace App\Entity;


use DateTimeZone;

class Project
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
     * @var DateTimeZone
     */
    private $createAt;

    /**
     * @var array Lists
     */
    private $lists;

    /**
     * @var array User
     */
    private  $guest;

    public function __construct()
    {
        //TODO aleatoirement
        $this->id = 0;
        $this->lists = [];
        $this->guest = [];
        $this->createAt = new DateTimeZone();
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
     * @return Project
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
     * @return Project
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
     * @return Project
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
     * @return Project
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
     * @return Project
     */
    public function setLists($lists)
    {
        $this->lists = $lists;
        return $this;
    }

    /**
     * @return arra
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * @param arra $guest
     * @return Project
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;
        return $this;
    }

}