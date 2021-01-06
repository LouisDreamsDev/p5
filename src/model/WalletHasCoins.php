<?php

namespace App\src\model;

class WalletHasCoins
{
    /**
     * @var int
     */

    private $walletId;

    /**
     * @var int
     */

    private $coinId;

    /**
     * @var string
     */

    private $coinSymbol;

    /**
     * @var int
     */
    private $coinPrice;

    /**
     * @var int
     */
    private $coinQuantity;

    /**
     * attribut de relation avec Coin
     * @return array<Coin>
     */
    private $coins = [];

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
        return $this->coins;
    }
    
    /**
     * setCoins
     *
     * @param  mixed $coins
     * @return void
     */
    
    public function setCoins($coins = [])
    {
        $this->coins = $coins;
    }
    
    /**
     * addCoins
     *
     * @param  mixed $coin
     * @return void
     */

    public function addCoins($coin)
    {
        $this->coins[] = $coin;
    }
}