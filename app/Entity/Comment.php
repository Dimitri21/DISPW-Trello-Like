<?php


namespace App\Entity;

class Comment
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
     * @var array User
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
     * @return Comment
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
     * @return Comment
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
     * @return Comment
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
     * @return Comment
     */
    public function setUsers($users)
    {
        $this->users = $users;
        return $this;
    }

}