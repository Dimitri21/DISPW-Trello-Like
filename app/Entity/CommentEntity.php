<?php


namespace App\Entity;

class CommentEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \DateTimeZone
     */
    private $createAt;

    /**
     * @var array UsersEntity
     */
    private $users;

    public function __construct()
    {
        $this->id = 0;
        $this->createAt  = new \DateTimeZone();
        $this->users = [];
        $this->comment = "";
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
     * @return CommentEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return CommentEntity
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
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
     * @return CommentEntity
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
        return $this;
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param array $users
     * @return CommentEntity
     */
    public function setUsers($users)
    {
        $this->users = $users;
        return $this;
    }

}