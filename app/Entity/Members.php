<?php


namespace App\Entity;


class Members
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $user;

    /**
     * @var \DateTime
     */
    private $invited_at;

    /**
     * @var int
     */
    private $project;

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
     * @return Members
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvitedAt(): string
    {
        return $this->invited_at;
    }

    /**
     * @param \DateTime $invited_at
     * @return Members
     */
    public function setInvitedAt(\DateTime $invited_at): Members
    {
        $this->invited_at = $invited_at;
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
     * @return Members
     */
    public function setUser(int $user): Members
    {
        $this->user = $user;
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
     * @return Members
     */
    public function setProject(int $project): Members
    {
        $this->project = $project;
        return $this;
    }


}