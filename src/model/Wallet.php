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
     * @var \DateTime
     */
    private $lastModified;

    /**
     * attribut de relation avec Coin
     * @return array<WalletHasCoins>
     */
    private $walletHasCoins = [];

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
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * @param \DateTime $lastModified
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;
    }

    
    /**
     * getWalletHasCoins
     *
     * @return void
     */
    public function getWalletHasCoins()
    {
        return $this->walletHasCoins;    
    }
    
    /**
     * setWalletHasCoins
     * 
     * @param  mixed $walletHasCoins
     * @return void
     */
    public function setWalletHasCoins($walletHasCoins)
    {
        $this->walletHasCoins = $walletHasCoins;
    } 
    
    /**
     * addWalletHasCoins
     *
     * @param  mixed $walletHasCoins
     * @return void
     */
    public function addWalletHasCoins($walletHasCoins)
    {
        $this->walletHasCoins[] = $walletHasCoins;
    }

}