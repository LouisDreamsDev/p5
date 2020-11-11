<?php 

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Wallet;

class WalletDAO extends DAO

{
    private function buildObject($row)
    {
        $wallet = new Wallet();
        $wallet->setId($row['id']);
        $wallet->setTitle($row['title']);
        $wallet->setSymbol($row['symbol']);
        $wallet->setLast_Modified($row['last_modified']);
        return $wallet;
    }

    public function getWalletsFromUser($user_id)
    {
        $sql = 'SELECT wallet.id, wallet.title, coins.symbol, wallet.value, wallet.last_modified
        FROM wallet 
        INNER JOIN coins
        ON wallet.symbol = coins.symbol
        WHERE wallet.user_id = ?';
        $result = $this->createQuery($sql, [$user_id]);
        $wallets = [];
        foreach ($result as $row)
        {
            $wallet_id = $row['id'];
            $wallets[$wallet_id] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $wallets;
    }

    public function deleteWallet($wallet_id)
    {
        
    }

    public function deleteCoin()
    {

    }

}