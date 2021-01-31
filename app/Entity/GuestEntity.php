<?php


namespace App\Entity;


class GuestEntity
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
     * @var ProjectEntity
     */
    private $project;

    public function __construct(UserEntity $user, ProjectEntity $project)
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
     * @return GuestEntity
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
     * @return GuestEntity
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
     * @return GuestEntity
     */
    public function setInvitedAt($invitedAt)
    {
        $this->invitedAt = $invitedAt;
        return $this;
    }

    /**
     * @return ProjectEntity
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param ProjectEntity $project
     * @return GuestEntity
     */
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }

}