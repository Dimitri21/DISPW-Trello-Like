<?php


namespace App\Entity;


use DateTimeZone;

class ProjectEntity
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
     * @var array ListsEntity
     */
    private $lists;

    /**
     * @var array UsersEntity
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
     * @return ProjectEntity
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
     * @return ProjectEntity
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
     * @return ProjectEntity
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
     * @return ProjectEntity
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
     * @return ProjectEntity
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
     * @return ProjectEntity
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;
        return $this;
    }

}