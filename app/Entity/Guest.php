<?php


namespace App\Entity;


class Guest
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var UserEntity
     */
    private $user;

    /**
     * @var \DateTime
     */
    private $invitedAt;

    /**
     * @var Project
     */
    private $project;

    public function __construct(UserEntity $user, Project $project)
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
     * @return Guest
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return UserEntity
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserEntity $user
     * @return Guest
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
     * @return Guest
     */
    public function setInvitedAt($invitedAt)
    {
        $this->invitedAt = $invitedAt;
        return $this;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     * @return Guest
     */
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }

}