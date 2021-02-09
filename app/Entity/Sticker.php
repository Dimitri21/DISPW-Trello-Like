<?php


namespace App\Entity;


class Sticker
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var mixed|string
     */
    private $name;

    /**
     * @var mixed|string
     */
    private $color;

    public function __construct($name = "" , $color = "")
    {
        $this->id = 0;
        $this->name = $name;
        $this->color = $color;
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
     * @return Sticker
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed|string $name
     * @return Sticker
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed|string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed|string $color
     * @return Sticker
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

}