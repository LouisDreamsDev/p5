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
        $wallet->setCreated_at($row['created_at']);
        $wallet->setRole($row['name']);
        $wallet->setCoins($row['coins']);
        return $wallet;
    }

    public function getWallets()
    {
        $sql = 'SELECT wallet.id, wallet.title, wallet.coins, user.pseudo, wallet-created_at FROM wallet INNER JOIN user ON wallet.user_id = user.id';
        $result = $this->createQuery($sql);
        $wallets = [];
        foreach ($result as $row)
        {
            $walletId = $row['id'];
            $wallets[$walletId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $wallets;
    }

    public function deleteWallet()
    {

    }

    public function deleteCoin()
    {

    }

}