<?php 

namespace App\src\DAO;

use App\src\model\WalletHasCoins;

class WalletHasCoinsDAO extends DAO

{
    public function buildObject($row)
    {
        $walletHasCoins = new WalletHasCoins();
        $walletHasCoins->setWalletId($row['walletId']);
        $walletHasCoins->setCoinId($row['coinId']);
        $walletHasCoins->setCoinSymbol($row['symbol']);
        $walletHasCoins->setCoinPrice($row['price']);
        $walletHasCoins->setCoinQuantity($row['coinQuantity']);
        return $walletHasCoins;
    }

    public function getCoinsFromWallet($walletId)
    {
        $sql = 'SELECT wallet_has_coins.walletId, wallet_has_coins.coinId, wallet_has_coins.coinQuantity, coins.symbol, coins.price
        FROM wallet_has_coins
        INNER JOIN wallet ON wallet_has_coins.walletId = wallet.id
        INNER JOIN coins ON wallet_has_coins.coinId = coins.id
        WHERE wallet_has_coins.walletId = ?';
        $result = $this->createQuery($sql, [$walletId]);
        $walletHasCoins = [];
        foreach ($result as $row)
        {
            $coinId = $row['coinId'];
            $walletHasCoins[$coinId] = $this->buildObject($row);

        }
        $result->closeCursor();
        return $walletHasCoins;
    }

    public function editCoin($walletId, $coinId, $coinQuantity = 0)
    {
        $sql = 'UPDATE wallet_has_coins SET walletId=:walletId, coinId=:coinId, coinQuantity=:coinQuantity';
        $this->createQuery($sql, [
            'walletId' => $walletId,
            'coinId' => $coinId,
            'coinQuantity' => $coinQuantity
        ]);
    }

    public function deleteCoinFromWallet($walletId, $coinId)
    {
        $sql = 'DELETE FROM wallet_has_coins WHERE wallet_has_coins.walletId = ? AND wallet_has_coins.coinId = ?';
        $this->createQuery($sql, [$walletId, $coinId]);
    }
}