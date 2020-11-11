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
     * @var string
     */

    private $coin_value;

    /**
     * @var \DateTime
     */
    private $last_modified;

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
     * @return string
     */
    public function getCoin_value()
    {
        return $this->coin_value;
    }

    /**
     * @param string $coin_value
     */
    public function setCoin_value($coin_value)
    {
        $this->symbol = $coin_value;
    }


    /**
     * @return \DateTime
     */
    public function getLast_Modified()
    {
        return $this->last_modified;
    }

    /**
     * @param \DateTime $last_modified
     */
    public function setLast_Modified($last_modified)
    {
        $this->createdAt = $last_modified;
    }

}