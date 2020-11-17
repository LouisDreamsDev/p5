<?php

namespace App\src\model;

class WalletHasCoins
{
    /**
     * @var int
     */

    private $wallet_id;

    /**
     * @var int
     */

    private $coin_id;

    /**
     * @var int
     */

    private $coin_price;

    /**
     * @var int
     */

    private $coin_value;
    /**
     * @return int
     */

    public function getWallet_id()
    {
        return $this->wallet_id;
    }

    /**
     * @param int $wallet_id
     */

    public function setWallet_id($wallet_id)
    {
        $this->wallet_id = $wallet_id;
    }

    /**
     * @return int
     */

    public function getCoin_id()
    {
        return $this->coin_id;
    }

    /**
     * @param int $coin_id
     */
    
    public function setCoin_id($coin_id)
    {
        $this->coin_id = $coin_id;
    }
    
    /**
     * @return int
     */
    public function getCoin_price()
    {
        return $this->coin_price;
    }

    /**
     * @param string $coin_price
     */
    public function setCoin_price($coin_price)
    {
        if ($coin_price > 50)
        {
            $this->coin_price = round($coin_price, 2);
        }
        else{
            $this->coin_price = round($coin_price, 4);
        }
    }
    /**
     * @return int
     */

    public function getCoin_value()
    {
        return $this->coin_value;
    }

    /**
     * @param int $coin_value
     */
    
    public function setCoin_value($coin_value)
    {
        $this->coin_value = $coin_value;
    }  
}