<?php 

namespace App\src\DAO;

use App\src\model\Coin;

class CoinDAO extends DAO 
{

    public function buildObject($row)
    {
        $coin = new Coin();
        $coin->setId($row['id']);   
        $coin->setCoinName($row['coinName']);
        $coin->setSymbol($row['symbol']);
        $coin->setSlug($row['slug']);
        $coin->setMaxSupply($row['maxSupply']);
        $coin->setCirculatingSupply($row['circulatingSupply']);
        $coin->setTotalSupply($row['totalSupply']);
        $coin->setCmcRank($row['cmcRank']);
        $coin->setLastUpdated($row['lastUpdated']);
        $coin->setPrice($row['price']);
        $coin->setVolume24h($row['volume24h']);
        $coin->setPercentChange1h($row['percentChange1h']);
        $coin->setPercentChange24h($row['percentChange24h']);
        $coin->setPercentChange7d($row['percentChange7d']);
        $coin->setMarketCap($row['marketCap']);
        return $coin;
    }

    public function getCoins()
    {
        $sql = 'SELECT id, coinName, symbol, slug, maxSupply, circulatingSupply, totalSupply, cmcRank, lastUpdated, price, volume24h, percentChange1h, percentChange24h, percentChange7d, marketCap FROM coins';
        $result = $this->createQuery($sql);
        $coins = [];
        foreach ($result as $row)
        {
            $coinId = $row['id'];
            $coins[$coinId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $coins;
    }

    public function getCoinFromId($coin_id)
    {
        $sql = 'SELECT id, coinName, symbol, slug, maxSupply, circulatingSupply, totalSupply, cmcRank, lastUpdated, price, volume24h, percentChange1h, percentChange24h, percentChange7d, marketCap
        FROM coins
        WHERE coins.id = ?';
        $result = $this->createQuery($sql, [$coin_id]);
        $coin = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($coin);
    }

    public function addApiDataIntoDb($data)
    {
        foreach ($data as $coin)
        {
            $name = $coin->name;
            $symbol = $coin->symbol;
            $slug = $coin->slug;
            $maxSupply = (!empty($coin->max_supply)) ? $coin->max_supply : 0;
            $circulatingSupply = $coin->circulating_supply;
            $totalSupply = $coin->total_supply;
            $cmcRank = $coin->cmc_rank;
            $price = $coin->quote->EUR->price;
            $volume24h = $coin->quote->EUR->volume_24h;
            $percentChange1h = $coin->quote->EUR->percent_change_1h;
            $percentChange24h = $coin->quote->EUR->percent_change_24h;
            $percentChange7d = $coin->quote->EUR->percent_change_7d;
            $marketCap = $coin->quote->EUR->market_cap;
                        
            $sql = "INSERT INTO coins 
            (coinName, symbol, slug, maxSupply, circulatingSupply, totalSupply, cmcRank,lastUpdated, price, volume24h, percentChange1h, percentChange24h, percentChange7d, marketCap)
            VALUES ('$name', '$symbol', '$slug', {$maxSupply},{$circulatingSupply}, {$totalSupply}, {$cmcRank}, NOW(), {$price}, {$volume24h}, {$percentChange1h}, {$percentChange24h}, {$percentChange7d}, {$marketCap})
            ON DUPLICATE KEY UPDATE
            coinName = '$name',
            symbol = '$symbol',
            slug = '$slug',
            maxSupply = {$maxSupply},
            circulatingSupply = {$circulatingSupply},
            totalSupply = {$totalSupply},
            cmcRank = {$cmcRank},
            lastUpdated = NOW(),
            price = {$price},
            volume24h = {$volume24h},
            percentChange1h = {$percentChange1h},
            percentChange24h = {$percentChange24h},
            percentChange7d = {$percentChange7d},
            marketCap = {$marketCap}
            ";
            $this->createQuery($sql);
        }
    }

}