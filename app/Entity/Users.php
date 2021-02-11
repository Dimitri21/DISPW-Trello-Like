<?php

namespace app\Entity;

use app\Entity;

class Users extends Entity
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
    private $picture;

    /**
     * @var array Projects
     */
    private $projects;

    public function __construct()
    {
        $class_name = explode(DIRECTORY_SEPARATOR, get_class($this));
        $this->tableName = strtolower(str_replace("Entity", "", end($class_name)));
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
     * @return Users
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
     * @return Users
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
     * @return Users
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
     * @return Users
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
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
     * @return Users
     */
    public function setSubscriptionAt($subscriptionAt)
    {
        $this->subscriptionAt = $subscriptionAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     * @return Users
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
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
     * @return Users
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;
        return $this;
    }
}
