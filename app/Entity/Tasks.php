<?php


namespace app\Entity;

use app\App;

class Tasks
{
    const STICKERS = ["proposed", "active", "solve", "tested", "closed"];
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
     * @var \DateTIme
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $start_at;

    /**
     * @var \DateTime
     */
    private $modified_at;

    /**
     * @var \DateTime
     */
    private $end_at;

    /**
     * @var Users
     */
    private $lead;

    /**
     * @var Comments[]
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

    /**
     * @var int
     */
    private $lists;

    /**
     * @var Stickers
     */
    private $stickerObj;

    public function __construct()
    {
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Tasks
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return Comments[]
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
     * @return int
     */
    public function getSticker(): int
    {
        return $this->sticker;
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
     * @param string
     * @return Tasks
     */
    public function getCreator()
    {
        return strtoupper($this->getCreatedByObj()->getName()) . " " . ucfirst($this->getCreatedByObj()->getLastname());
    }

    /**
     * @return int
     */
    public function getLists(): int
    {
        return $this->lists;
    }

    /**
     * @param int $lists
     * @return Tasks
     */
    public function setLists(int $lists): Tasks
    {
        $this->lists = $lists;
        return $this;
    }

    /**
     * @return \DateTIme
     */
    public function getCreatedAt(): \DateTIme
    {
        return $this->created_at;
    }

    /**
     * @param \DateTIme $created_at
     * @return Tasks
     */
    public function setCreatedAt(\DateTIme $created_at): Tasks
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartAt()
    {
        return $this->start_at;
    }

    /**
     * @param \DateTime $start_at
     * @return Tasks
     */
    public function setStartAt(\DateTime $start_at): Tasks
    {
        $this->start_at = $start_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getModifiedAt()
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
     * @return string
     */
    public function getEndAt()
    {
        return  $this->end_at;
    }

    /**
     * @param \DateTime $end_at
     * @return Tasks
     */
    public function setEndAt(\DateTime $end_at): Tasks
    {
        $this->end_at = $end_at;
        return $this;
    }

    public function formatDate(string $date)
    {
        return date("Y-m-d", strtotime($date));
    }

    /**
     * @return Stickers
     */
    public function getStickerObj(): Stickers
    {
        return $this->stickerObj;
    }

    /**
     * @param Stickers $stickerObj
     * @return Tasks
     */
    public function setStickerObj(Stickers $stickerObj): Tasks
    {
        $this->stickerObj = $stickerObj;
        return $this;
    }


}
