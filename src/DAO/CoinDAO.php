<?php 

namespace App\src\DAO;

use App\src\model\Coin;

class CoinDAO extends DAO 
{

    private function buildObject($row)
    {
        $coin = new Coin();
        $coin->setId($row['id']);   
        $coin->setCoin_name($row['coin_name']);
        $coin->setSymbol($row['symbol']);
        $coin->setSlug($row['slug']);
        $coin->setMax_supply($row['max_supply']);
        $coin->setCirculating_supply($row['circulating_supply']);
        $coin->setTotal_supply($row['total_supply']);
        $coin->setCmc_rank($row['cmc_rank']);
        $coin->setLast_updated($row['last_updated']);
        $coin->setPrice($row['price']);
        $coin->setVolume_24h($row['volume_24h']);
        $coin->setPercent_change_1h($row['percent_change_1h']);
        $coin->setPercent_change_24h($row['percent_change_24h']);
        $coin->setPercent_change_7d($row['percent_change_7d']);
        $coin->setMarket_cap($row['market_cap']);
        return $coin;
    }

    public function getCoins()
    {
        $sql = 'SELECT id, coin_name, symbol, slug, max_supply, circulating_supply, total_supply, cmc_rank, last_updated, price, volume_24h, percent_change_1h, percent_change_24h, percent_change_7d, market_cap FROM coins';
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
        $sql = 'SELECT id, coin_name, symbol, slug, max_supply, circulating_supply, total_supply, cmc_rank, last_updated, price, volume_24h, percent_change_1h, percent_change_24h, percent_change_7d, market_cap
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
            $max_supply = (!empty($coin->max_supply)) ? $coin->max_supply : 0;
            $circulating_supply = $coin->circulating_supply;
            $total_supply = $coin->total_supply;
            $cmc_rank = $coin->cmc_rank;
            $price = $coin->quote->EUR->price;
            $volume_24h = $coin->quote->EUR->volume_24h;
            $percent_change_1h = $coin->quote->EUR->percent_change_1h;
            $percent_change_24h = $coin->quote->EUR->percent_change_24h;
            $percent_change_7d = $coin->quote->EUR->percent_change_7d;
            $market_cap = $coin->quote->EUR->market_cap;
                        
            $sql = "INSERT INTO coins 
            (coin_name, symbol, slug, max_supply, circulating_supply, total_supply, cmc_rank,last_updated, price, volume_24h, percent_change_1h, percent_change_24h, percent_change_7d, market_cap)
            VALUES ('$name', '$symbol', '$slug', {$max_supply},{$circulating_supply}, {$total_supply}, {$cmc_rank}, NOW(), {$price}, {$volume_24h}, {$percent_change_1h}, {$percent_change_24h}, {$percent_change_7d}, {$market_cap})
            ON DUPLICATE KEY UPDATE
            coin_name = '$name',
            symbol = '$symbol',
            slug = '$slug',
            max_supply = {$max_supply},
            circulating_supply = {$circulating_supply},
            total_supply = {$total_supply},
            cmc_rank = {$cmc_rank},
            last_updated = NOW(),
            price = {$price},
            volume_24h = {$volume_24h},
            percent_change_1h = {$percent_change_1h},
            percent_change_24h = {$percent_change_24h},
            percent_change_7d = {$percent_change_7d},
            market_cap = {$market_cap}
            ";
            $this->createQuery($sql);
        }
    }

}