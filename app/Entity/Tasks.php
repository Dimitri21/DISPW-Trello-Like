<?php


namespace app\Entity;

class Tasks
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
    private $desciption;

    /**
     * @var \DateTIme
     */
    private $createAt;

    /**
     * @var \DateTime
     */
    private $startAt;

    /**
     * @var \DateTime
     */
    private $endAt;

    /**
     * @var UsersEntity
     */
    private $lead;

    //TODO à determiner le type de state
    /**
     * @var int
     */
    private $state;

    /**
     * @var array Comment
     */
    private $comments;

    public function __construct()
    {

        $this->comments = [];
        $this->createAt = new \DateTime();
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
     * @return Tasks
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
     * @return Tasks
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDesciption()
    {
        return $this->desciption;
    }

    /**
     * @param string $desciption
     * @return Tasks
     */
    public function setDesciption($desciption)
    {
        $this->desciption = $desciption;
        return $this;
    }

    /**
     * @return \DateTIme
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * @param \DateTIme $createAt
     * @return Tasks
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * @param \DateTime $startAt
     * @return Tasks
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * @param \DateTime $endAt
     * @return Tasks
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;
        return $this;
    }

    /**
     * @return UsersEntity
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * @param UsersEntity $lead
     * @return Tasks
     */
    public function setLead($lead)
    {
        $this->lead = $lead;
        return $this;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $state
     * @return Tasks
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return array
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param array $comments
     * @return Tasks
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

}