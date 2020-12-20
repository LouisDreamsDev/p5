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
     * @var string
     */

    private $coin_symbol;

    /**
     * @var int
     */

    private $coin_price;

    /**
     * @var int
     */

    private $coin_quantity;

    /**
     * @return int
     */
    
    public function get_wallet_id()
    {
        return $this->wallet_id;
    }

    /**
     * @param int $wallet_id
     */

    public function set_wallet_id($wallet_id)
    {
        $this->wallet_id = $wallet_id;
    }

    /**
     * @return int
     */

    public function get_coin_id()
    {
        return $this->coin_id;
    }

    /**
     * @param int $coin_id
     */
    
    public function set_coin_id($coin_id)
    {
        $this->coin_id = $coin_id;
    }

    /**
     * @return string $coin_symbol
     */
    public function get_coin_symbol()
    {
        return $this->coin_symbol;
    }

    /**
     * @param string $coin_symbol
     */

    public function set_coin_symbol($coin_symbol)
    {
        $this->coin_symbol = $coin_symbol;
    }
    
    /**
     * @return int
     */
    public function get_coin_price()
    {
        return $this->coin_price;
    }

    /**
     * @param string $coin_price
     */
    public function set_coin_price($coin_price)
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

    public function get_coin_quantity()
    {
        return $this->coin_quantity;
    }

    /**
     * @param int $coin_quantity
     */
    
    public function set_coin_quantity($coin_quantity)
    {
        $this->coin_quantity = $coin_quantity;
    }  
}