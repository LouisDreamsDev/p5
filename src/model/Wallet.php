<?php

namespace App\src\model;

class Wallet
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var array
     */
    private $coins;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var string
     */
    private $role;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCoins()
    {
        return $this->coins;
    }

    /**
     * @param string $title
     */
    public function setCoins($coins)
    {
        $this->coins = $coins;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return \DateTime
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreated_at($created_at)
    {
        $this->createdAt = $created_at;
    }

    /**
     * @param string $role
     */
    public function getRole()
    {
        return $this->role;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }
}