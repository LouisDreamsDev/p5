<?php 

namespace App\src\DAO;

use App\src\model\WalletHasCoins;

class WalletHasCoinsDAO extends DAO

{
    public function buildObject($row)
    {
        $walletHasCoins = new WalletHasCoins();
        $walletHasCoins->setWalletId($row['wallet_id']);
        $walletHasCoins->setCoinId($row['coin_id']);
        $walletHasCoins->setCoinSymbol($row['symbol']);
        $walletHasCoins->setCoinPrice($row['price']);
        $walletHasCoins->setCoinQuantity($row['coin_quantity']);
        return $walletHasCoins;
    }

    public function getCoinsFromWallet($wallet_id)
    {
        $sql = 'SELECT wallet_has_coins.wallet_id, wallet_has_coins.coin_id, coins.symbol, coins.price, wallet_has_coins.coin_quantity
        FROM wallet_has_coins
        INNER JOIN wallet ON wallet_has_coins.wallet_id = wallet.id
        INNER JOIN coins ON wallet_has_coins.coin_id = coins.id
        WHERE wallet_has_coins.wallet_id = ?';
        $result = $this->createQuery($sql, [$wallet_id]);
        $coins = [];
        foreach ($result as $row)
        {
            $coin_id = $row['coin_id'];
            $coins[$coin_id] = $this->buildObject($row);
            /* creation objet wallet has coins  */
        }
        $result->closeCursor();
        return $coins;
    }

    public function edit_coin_quantity($wallet_id, $w_coin_id, $coin_quantity)
    {
        $sql = 'UPDATE wallet_has_coins SET wallet_id=:wallet_id, coin_id=:coin_id, coin_quantity=:coin_quantity';
        $this->createQuery($sql, [
            'wallet_id' => $wallet_id,
            'coin_id' => $w_coin_id,
            'coin_quantity' => $coin_quantity
        ]);
    }

    public function delete_coin_from_wallet($wallet_id, $w_coin_id)
    {
        $sql = 'DELETE FROM wallet_has_coins WHERE wallet_has_coins.wallet_id = ? AND wallet_has_coins.coin_id = ?';
        $this->createQuery($sql, [$wallet_id, $w_coin_id]);
    }
}