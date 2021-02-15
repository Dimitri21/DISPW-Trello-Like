<?php


namespace app\Entity;


use DateTime;

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
     * @var DateTime
     */
    private $createAt;

    /**
     * @var DateTime
     */
    private $modifiedAt;

    /**
     * @var array Task
     */
    private $tasks;

    /**
     * @var int
     */
    private $project;

    /**
     * @var int
     */
    private $orders;

    public function __construct()
    {
        //TODO aleat
        $this->tasks = [];
        $this->createAt = new DateTime("now");
        $this->modifiedAt = new DateTime('now');
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
     * @return DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * @param DateTime $createAt
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

    /**
     * @return DateTime
     */
    public function getModifiedAt(): DateTime
    {
        return $this->modifiedAt;
    }

    /**
     * @param DateTime $modifiedAt
     * @return Lists
     */
    public function setModifiedAt(DateTime $modifiedAt): Lists
    {
        $this->modifiedAt = $modifiedAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrders(): int
    {
        return $this->orders;
    }

    /**
     * @param int $orders
     * @return Lists
     */
    public function setOrders(int $orders): Lists
    {
        $this->orders = $orders;
        return $this;
    }

    /**
     * @return int
     */
    public function getProject(): int
    {
        return $this->project;
    }

    /**
     * @param int $project
     * @return Lists
     */
    public function setProject(int $project): Lists
    {
        $this->project = $project;
        return $this;
    }



}