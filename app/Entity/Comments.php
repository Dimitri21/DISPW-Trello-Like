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
    private $created_at;

    /**
     * @var Users
     */
    private $user_obj;

    /**
     * @var int
     */
    private $user;

    /**
     * @var Tasks
     */
    private $task;

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

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     * @return Comments
     */
    public function setCreatedAt(\DateTime $created_at): Comments
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return Users
     */
    public function getUserObj(): Users
    {
        return $this->user_obj;
    }

    /**
     * @param Users $user_obj
     * @return Comments
     */
    public function setUserObj(Users $user_obj): Comments
    {
        $this->user_obj = $user_obj;
        return $this;
    }

    /**
     * @return int
     */
    public function getUser(): int
    {
        return $this->user;
    }

    /**
     * @param int $user
     * @return Comments
     */
    public function setUser(int $user): Comments
    {
        $this->user = $user;
        return $this;
    }


}