<?php 

namespace App\src\DAO;

use App\src\model\WalletHasCoins;

class WalletHasCoinsDAO extends DAO

{
    private function buildObject($row)
    {
        $walletHasCoins = new WalletHasCoins();
        $walletHasCoins->setWallet_id($row['wallet_id']);
        $walletHasCoins->setCoin_id($row['coin_id']);
        $walletHasCoins->setCoin_price($row['coin_price']);
        $walletHasCoins->setCoin_value($row['coin_value']);
        return $walletHasCoins;
    }

    public function getCoinsFromWallet($wallet_id)
    {
        $sql = 'SELECT wallet_id, coin_id, coin_price, coin_value
        FROM wallet_has_coins
        INNER JOIN wallet ON wallet_has_coins.wallet_id = wallet.id
        INNER JOIN coins ON wallet_has_coins.coin_id = coins.id AND wallet_has_coins.coin_price = coins.price
        WHERE wallet_has_coins.wallet_id = ?';
        $result = $this->createQuery($sql, [$wallet_id]);
        $coins = [];
        foreach ($result as $row)
        {
            $coin_id = $row['coin_id'];
            $coins[$coin_id] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $coins;
    }

    public function DeleteCoinFromWallet($wallet_id, $coin_id)
    {
        $sql = 'DELETE FROM wallet_has_coins WHERE wallet_id = ?, coin_id = ?';
        $this->createQuery($sql, [$wallet_id, $coin_id]);
    }
}