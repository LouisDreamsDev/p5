<?php

namespace App\src\model;

class Coin
{
    /**
     * @var int
     */
    private $id;    

    /**
     * @var string
     */
    private $coin_name;

    /**
     * @var string
     */
    private $symbol;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var int
     */
    private $max_supply;

    /** 
     * @var int
     */
    private $circulating_supply;

    /**
     * @var int
     */
    private $total_supply;

    /**
     * @var int
     */
    private $cmc_rank;

    /**
     * @var \DateTime
     */
    private $last_updated;

    /**
     * @var int
     */
    private $price;

    /**
     * @var int
     */
    private $volume_24h;

    /**
     * @var int
     */
    private $percent_change_1h;

    /**
     * @var int
     */
    private $percent_change_24h;

    /**
     * @var int
     */
    private $percent_change_7d;

    /**
     * @var int
     */
    private $market_cap;

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
    public function getCoin_name()
    {
        return $this->coin_name;
    }

    /**
     * @param string $coin_name
     */
    public function setCoin_name($coin_name)
    {
        $this->coin_name = $coin_name;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return int
     */
    public function getMax_supply()
    {
        return $this->max_supply;
    }

    /**
     * @param int $max_supply
     */
    public function setMax_supply($max_supply)
    {
        !d($this->max_supply);
        $this->max_supply = $max_supply;
        !d($this->max_supply);
/*         if(is_null($this->max_supply))
        {
            $this->max_supply = $max_supply;
        }
        !d($this->max_supply); */
    }

    /**
     * @return float
     */
    public function getCirculating_supply()
    {
        return $this->circulating_supply;
    }

    /**
     * @param float $circulating_supply
     */
    public function setCirculating_supply($circulating_supply)
    {
        
    }

    /**
     * @return int
     */
    public function getTotal_supply()
    {
        return $this->total_supply;
    }

    /**
     * @param int $total_supply
     */
    public function setTotal_supply($total_supply)
    {
        $this->$total_supply = $total_supply;
    }

    /**
     * @return string
     */
    public function getCmc_rank()
    {
        return $this->cmc_rank;
    }

    /**
     * @param string $cmc_rank
     */
    public function setCmc_rank($cmc_rank)
    {
        $this->$cmc_rank = $cmc_rank;
    }

    /**
     * @return \DateTime
     */
    public function getLast_updated()
    {
        return $this->last_updated;
    }

    /**
     * @param \DateTime $last_updated
     */
    public function setLast_updated($last_updated)
    {
        $this->last_updated = $last_updated;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        !d($this->price);
        $this->price = $price;
        if(is_null($this->price)) 
        {
            $this->$price = $price;
        }
        !d($this->price);
    }

    /**
     * @return int
     */
    public function getVolume_24h()
    {
        return $this->volume_24h;
    }

    /**
     * @param int $volume_24h
     */
    public function setVolume_24h($volume_24h)
    {
        $this->$volume_24h = $volume_24h;
    }

    /**
     * @return int
     */
    public function getPercent_change_1h()
    {
        return $this->percent_change_1h;
    }

    /**
     * @param int $percent_change_1h
     */
    public function setPercent_change_1h($percent_change_1h)
    {
        $this->$percent_change_1h = $percent_change_1h;
    }

    /**
     * @return int
     */
    public function getPercent_change_24h()
    {
        return $this->percent_change_24h;
    }

    /**
     * @param int $percent_change_24h
     */
    public function setPercent_change_24h($percent_change_24h)
    {
        $this->$percent_change_24h = $percent_change_24h;
    }

    /**
     * @return int
     */
    public function getPercent_change_7d()
    {
        return $this->percent_change_7d;
    }

    /**
     * @param int $percent_change_7d
     */
    public function setPercent_change_7d($percent_change_7d)
    {
        $this->$percent_change_7d = $percent_change_7d;
    }

    /**
     * @return int
     */
    public function getMarket_cap()
    {
        return $this->market_cap;
    }

    /**
     * @param int $market_cap
     */
    public function setMarket_cap($market_cap)
    {
        $this->$market_cap = $market_cap;
    }
}
