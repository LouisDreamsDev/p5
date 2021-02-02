<?php

namespace App\src\model;

class WalletHasCoins
{    
    /**
     * whcId
     *
     * @var int
     */
    private $whcId;
    
    /**
     * walletId
     *
     * @var int
     */
    private $walletId;
    
    /**
     * coinId
     *
     * @var int
     */
    private $coinId;
 
    /**
     * coinSymbol
     *
     * @var string
     */
    private $coinSymbol;

    /**
     * coinPrice
     *
     * @var int
     */
    private $coinPrice;

    
    /**
     * coinQuantity
     *
     * @var int
     */
    private $coinQuantity;

    /**
     * attribut de relation avec Coin
     * @return array<Coin>
     */
    private $coins = [];

    
    /**
     * getWhcId
     *
     * @return int
     */
    public function getWhcId()
    {
        return $this->whcId;
    }
        
    /**
     * setWhcId
     * setter $this->whcId
     * @param  int $whcId
     * @return void
     */
    public function setWhcId($whcId)
    {
        $this->whcId = $whcId;
    }
        
    /**
     * getWalletId
     *
     * @return int
     */

    public function getWalletId()
    {
        return $this->walletId;
    }

    /**
     * @param int $walletId
     */

    public function setWalletId($walletId)
    {
        $this->walletId = $walletId;
    }

    /**
     * @return int
     */

    public function getCoinId()
    {
        return $this->coinId;
    }

    /**
     * @param int $coinId
     */
    
    public function setCoinId($coinId)
    {
        $this->coinId = $coinId;
    }

    /**
     * @return string $coinSymbol
     */
    public function getCoinSymbol()
    {
        return $this->coinSymbol;
    }

    /**
     * @param string $coinSymbol
     */

    public function setCoinSymbol($coinSymbol)
    {
        $this->coinSymbol = $coinSymbol;
    }
    
    /**
     * @return int
     */
    public function getCoinPrice()
    {
        return $this->coinPrice;
    }

    /**
     * @param string $coinPrice
     */
    public function setCoinPrice($coinPrice)
    {
        if ($coinPrice > 50)
        {
            $this->coinPrice = round($coinPrice, 2);
        }
        else{
            $this->coinPrice = round($coinPrice, 4);
        }
    }
    /**
     * @return int
     */

    public function getCoinQuantity()
    {
        return $this->coinQuantity;
    }

    /**
     * @param int $coinQuantity
     */
    
    public function setCoinQuantity($coinQuantity)
    {
        $this->coinQuantity = $coinQuantity;
    }
    
    
    
    /**
     * getCoins
     *
     * @return array
     */

    public function getCoins()
    {
        // d($this->coins);
        return $this->coins;
    }
    
    /**
     * setCoins
     *
     * @param  mixed $coins
     * 
     */

    public function setCoins(Coin $coin)
    {
        $this->coins = $coin;
        // d($this->coins);
    }
    
    /**
     * addCoins
     *
     * @param  mixed $coin
     * 
     */
    public function addCoins(Coin $coin)
    {
        $this->coins = $coin;
        //array_push($this->coins, $coin);
        // d($this->coins);
    }
}