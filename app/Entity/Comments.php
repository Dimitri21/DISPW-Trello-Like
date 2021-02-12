<?php


namespace App\Entity;

class Comments
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
     * @var \DateTime
     */
    private $createAt;

    /**
     * @var Users
     */
    private $user;

    /**
     * @var Tasks
     */
    private $task;

    public function __construct()
    {
        $this->createAt  = new \DateTime();
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
     * @param $id
     * @return $this
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
     * @param $comment
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * @param $createAt
     * @return $this
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
        return $this;
    }

    /**
     * @return Users
     */
    public function getUser() : Users
    {
        return $this->user;
    }

    /**
     * @param Users $user
     * @return $this
     */
    public function setUser(Users $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return Tasks
     */
    public function getTask(): Tasks
    {
        return $this->task;
    }

    /**
     * @param Tasks $task
     * @return Comments
     */
    public function setTask(Tasks $task): Comments
    {
        $this->task = $task;
        return $this;
    }

}