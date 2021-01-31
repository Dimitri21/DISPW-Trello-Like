<?php

class UsersEntity extends Entity
{
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
    private $lastname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var DateTime
     */
    private $subscriptionAt;

    /**
     * @var string
     */
    private $avatar;

    /**
     * @var array ProjectEntity
     */
    private $projects ;

    public function __construct()
    {
        $this->tableName = strtolower(str_replace("Entity","",get_class($this)));
        $this->getDatabase();
        $this->projects = [];
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
     * @return UsersEntity
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
     * @return UsersEntity
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return UsersEntity
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return UsersEntity
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return UsersEntity
     */
    public function setPassword($password)
    {
        $this->password = sha1($password);
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getSubscriptionAt()
    {
        return $this->subscriptionAt;
    }

    /**
     * @param DateTime $subscriptionAt
     * @return UsersEntity
     */
    public function setSubscriptionAt($subscriptionAt)
    {
        $this->subscriptionAt = $subscriptionAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     * @return UsersEntity
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
        return $this;
    }

    /**
     * @return array
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @param array $projects
     * @return UsersEntity
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;
        return $this;
    }


}