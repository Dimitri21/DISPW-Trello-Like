<?php


namespace App\Entity;


use DateTimeZone;

class Lists
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
     * @var array Task
     */
    private $tasks;

    public function __construct()
    {
        //TODO aleat
        $this->id = 0;
        $this->tasks = [];
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
     * @return Lists
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
     * @return Lists
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
     * @return Lists
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
     * @return Lists
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
        return $this;
    }

    /**
     * @return array
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param array $tasks
     * @return Lists
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
        return $this;
    }


}