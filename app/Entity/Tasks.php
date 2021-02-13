<?php


namespace app\Entity;

class Tasks
{
    const STICKERS = ["proposée","active","solve", "tested","closed"];
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
    private $modified_at;

    /**
     * @var \DateTime
     */
    private $endAt;

    /**
     * @var Users
     */
    private $lead;

    //TODO à determiner le type de state
    /**
     * @var int
     */
    private $state;

    /**
     * @var array Comments
     */
    private $comments;

    /**
     * @var int
     */
    private $sticker;

    /**
     * @var int
     */
    private $created_by;

    /**
     * @var Users
     */
    private $created_by_obj;

    public function __construct()
    {
        $this->comments = [];
        $this->createAt = new \DateTime("now");
        $this->modified_at = new \DateTime('now');
        $this->startAt = new  \DateTime('now');
        $this->endAt = new  \DateTime('now');
        $this->lead = -1;
        $this->sticker = 1;
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
     * @return Users
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * @param Users $lead
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

    /**
     * @return \DateTime
     */
    public function getModifiedAt(): \DateTime
    {
        return $this->modified_at;
    }

    /**
     * @param \DateTime $modified_at
     * @return Tasks
     */
    public function setModifiedAt(\DateTime $modified_at): Tasks
    {
        $this->modified_at = $modified_at;
        return $this;
    }

    /**
     * @return int
     */
    public function getSticker(): int
    {
        return $this->sticker;
    }

    /**
     * @return string
     */
    public function getStickerString(): string
    {
        //TODO  check index range
        return Tasks::STICKERS[$this->sticker-1];
    }

    /**
     * @param int $sticker
     * @return Tasks
     */
    public function setSticker(int $sticker): Tasks
    {
        $this->sticker = $sticker;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedBy(): int
    {
        return $this->created_by;
    }

    /**
     * @param int $created_by
     * @return Tasks
     */
    public function setCreatedBy(int $created_by): Tasks
    {
        $this->created_by = $created_by;
        return $this;
    }

    /**
     * @return Users
     */
    public function getCreatedByObj(): Users
    {
        return $this->created_by_obj;
    }

    /**
     * @param Users $created_by_obj
     * @return Tasks
     */
    public function setCreatedByObj(Users $created_by_obj): Tasks
    {
        $this->created_by_obj = $created_by_obj;
        return $this;
    }
    /**
     * @param Users $created_by_obj
     * @return Tasks
     */
    public function getCreator()
    {
        return strtoupper($this->getCreatedByObj()->getName()) ." ".ucfirst($this->getCreatedByObj()->getLastname());
    }



}