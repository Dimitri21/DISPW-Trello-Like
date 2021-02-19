<?php


namespace App\Entity;


class Members
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Users
     */
    private $user;

    /**
     * @var \DateTime
     */
    private $invitedAt;

    /**
     * @var Projects
     */
    private $project;

    public function __construct(Users $user, Projects $project)
    {
        $this->id = 0;
        $this->user = $user;
        $this->project = $project;
        $this->invitedAt = new \DateTime();
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
     * @return Users
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param Users $user
     * @return Members
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getInvitedAt()
    {
        return $this->invitedAt;
    }

    /**
     * @param \DateTime $invitedAt
     * @return Members
     */
    public function setInvitedAt($invitedAt)
    {
        $this->invitedAt = $invitedAt;
        return $this;
    }

    /**
     * @return Projects
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Projects $project
     * @return Members
     */
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }

}