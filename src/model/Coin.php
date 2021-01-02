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
    private $coinName;

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
    private $maxSupply;

    /** 
     * @var int
     */
    private $circulatingSupply;

    /**
     * @var int
     */
    private $totalSupply;

    /**
     * @var int
     */
    private $cmcRank;

    /**
     * @var \DateTime
     */
    private $lastUpdated;

    /**
     * @var int
     */
    private $price;

    /**
     * @var int
     */
    private $volume24h;

    /**
     * @var int
     */
    private $percentChange1h;

    /**
     * @var int
     */
    private $percentChange24h;

    /**
     * @var int
     */
    private $percentChange7d;

    /**
     * @var int
     */
    private $marketCap;

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
    public function getCoinName()
    {
        return $this->coinName;
    }

    /**
     * @param string $coinName
     */
    public function setCoinName($coinName)
    {
        $this->coinName = $coinName;
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
    public function getMaxSupply()
    {
        return $this->maxSupply;
    }

    /**
     * @param int $maxSupply
     */
    public function setMaxSupply($maxSupply)
    {
        if($maxSupply == 0)
        {
            $this->maxSupply ='Non définie par le protocole';
        }
        else
        {
            $this->maxSupply = number_format($maxSupply, 0, ',', ' ');
        }
    }

    /**
     * @return float
     */
    public function getCirculatingSupply()
    {
        return $this->circulatingSupply;
    }

    /**
     * @param float $circulatingSupply
     */
    public function setCirculatingSupply($circulatingSupply)
    {
        $this->circulatingSupply = number_format($circulatingSupply, 0, ',', ' ');
    }

    /**
     * @return int
     */
    public function getTotalSupply()
    {
        return $this->totalSupply;
    }

    /**
     * @param int $totalSupply
     */
    public function setTotalSupply($totalSupply)
    {
        $this->totalSupply = number_format($totalSupply, 0, ',', ' ');
    }

    /**
     * @return string
     */
    public function getCmcRank()
    {
        return $this->cmcRank;
    }

    /**
     * @param string $cmcRank
     */
    public function setCmcRank($cmcRank)
    {
        $this->cmcRank = $cmcRank;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param \DateTime $lastUpdated
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
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
        if ($price > 50)
        {
            $this->price = round($price, 2);
        }
        else{
            $this->price = round($price, 4);
        }
    }

    /**
     * @return int
     */
    public function getVolume24h()
    {
        return $this->volume24h;
    }

    /**
     * @param int $volume24h
     */
    public function setVolume24h($volume24h)
    {
        $this->volume24h = number_format($volume24h, 2, ',', ' ');
    }

    /**
     * @return int
     */
    public function getPercentChange1h()
    {
        return $this->percentChange1h;
    }

    /**
     * @param int $percentChange1h
     */
    public function setPercentChange1h($percentChange1h)
    {
        if ($percentChange1h > 0)
        {
            $this->percentChange1h = '+'.round($percentChange1h, 2);
        }
        else
        {
            $this->percentChange1h = round($percentChange1h, 2);
        }
    }

    /**
     * @return int
     */
    public function getPercentChange24h()
    {
        return $this->percentChange24h;
    }

    /**
     * @param int $percentChange24h
     */
    public function setPercentChange24h($percentChange24h)
    {
        if ($percentChange24h > 0)
        {
            $this->percentChange24h = '+'.round($percentChange24h, 2);
        }
        else
        {
            $this->percentChange24h = round($percentChange24h, 2);
        }
    }

    /**
     * @return int
     */
    public function getPercentChange7d()
    {
        return $this->percentChange7d;
    }

    /**
     * @param int $percentChange7d
     */
    public function setPercentChange7d($percentChange7d)
    {
        if ($percentChange7d > 0)
        {
            $this->percentChange7d = '+'.round($percentChange7d, 2);
        }
        else
        {
            $this->percentChange7d = round($percentChange7d, 2);
        }
    }

    /**
     * @return int
     */
    public function getMarketCap()
    {
        return $this->marketCap;
    }

    /**
     * @param int $marketCap
     */
    public function setMarketCap($marketCap)
    {
        $this->marketCap = number_format($marketCap, 0, ',', ' ');
    }
}
