<?php


namespace App\Entity;

class Task
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
     * @var \DateTimeZone
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
     * @var UserEntity
     */
    private $lead;

    //TODO à determiner le type de sticker
    /**
     * @var int
     */
    private $sticker;

    /**
     * @var array Comment
     */
    private $comments;

    public function __construct()
    {
        $this->id = 0;
        $this->lead = new UserEntity();
        $this->comments = [];
        $this->createAt = new \DateTimeZone();
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
     * @return Task
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
     * @return Task
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
     * @return Task
     */
    public function setDesciption($desciption)
    {
        $this->desciption = $desciption;
        return $this;
    }

    /**
     * @return \DateTimeZone
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * @param \DateTimeZone $createAt
     * @return Task
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
     * @return Task
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
     * @return Task
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;
        return $this;
    }

    /**
     * @return UserEntity
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * @param UserEntity $lead
     * @return Task
     */
    public function setLead($lead)
    {
        $this->lead = $lead;
        return $this;
    }

    /**
     * @return int
     */
    public function getSticker()
    {
        return $this->sticker;
    }

    /**
     * @param int $sticker
     * @return Task
     */
    public function setSticker($sticker)
    {
        $this->sticker = $sticker;
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
     * @return Task
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

}