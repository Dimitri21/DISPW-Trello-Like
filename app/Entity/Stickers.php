<?php


namespace App\Entity;


class Stickers
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
     * @return Stickers
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
     * @return Stickers
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
     * @return Stickers
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

}