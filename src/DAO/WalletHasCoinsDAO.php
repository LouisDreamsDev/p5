<?php 

namespace App\src\DAO;

use App\src\model\WalletHasCoins;

class WalletHasCoinsDAO extends DAO

{
    public function buildObject($row)
    {
        $walletHasCoins = new WalletHasCoins();
        $walletHasCoins->setWhcId($row['whcId']);
        $walletHasCoins->setWalletId($row['walletId']);
        $walletHasCoins->setCoinId($row['coinId']);
        $walletHasCoins->setCoinSymbol($row['symbol']);
        $walletHasCoins->setCoinPrice($row['price']);
        $walletHasCoins->setCoinQuantity($row['coinQuantity']);
        return $walletHasCoins;
    }

    public function getCoinsFromWallet($walletId)
    {
        $sql = 'SELECT wallet_has_coins.whcId, wallet_has_coins.walletId, wallet_has_coins.coinId, wallet_has_coins.coinQuantity, coins.symbol, coins.price
        FROM wallet_has_coins
        INNER JOIN wallet ON wallet_has_coins.walletId = wallet.id
        INNER JOIN coins ON wallet_has_coins.coinId = coins.id
        WHERE wallet_has_coins.walletId = ?';
        $result = $this->createQuery($sql, [$walletId]);
        $walletHasCoins = [];
        foreach ($result as $row)
        {
            $whcId = $row['whcId'];
            $walletHasCoins[$whcId] = $this->buildObject($row);

        }
        $result->closeCursor();
        return $walletHasCoins;
    }

    public function addWalletHasCoins($walletId, $coins = [])
    {
        $sql = 'INSERT INTO wallet_has_coins (walletId, coinId, coinQuantity)
                VALUES (?, ?, ?)';
        foreach($coins as $coin)
        {
            $this->createQuery($sql, [$walletId, $coin, 1]);
        }
    }

    public function editCoinQuantity($whcId, $coinQuantity)
    {
        $sql = 'UPDATE wallet_has_coins 
                SET coinQuantity=:coinQuantity 
                WHERE whcId=:whcId';

        $this->createQuery($sql, [
            'whcId' => $whcId,
            'coinQuantity' => $coinQuantity,
        ]);
    }

    public function deleteCoinFromWallet($whcId)
    {
        $sql = 'DELETE 
                FROM wallet_has_coins 
                WHERE wallet_has_coins.whcId = ?';
        $this->createQuery($sql, [$whcId]);
    }
}