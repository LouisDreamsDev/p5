<?php 

namespace App\src\DAO;

use App\src\model\Wallet;

use App\config\Parameter;

class WalletDAO extends DAO

{
    private function buildObject($row)
    {
        $wallet = new Wallet();
        $wallet->setId($row['id']);
        $wallet->setTitle($row['title']);
        $wallet->setLast_Modified($row['last_modified']);
        return $wallet;
    }

    public function getWalletsFromUser($user_id)
    {
        $sql = 'SELECT wallet.id, wallet.title, wallet.last_modified
        FROM wallet
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

    public function get_wallet($wallet_id)
    {
        $sql = 'SELECT wallet.id, wallet.title, wallet.last_modified, wallet.user_id
        FROM wallet
        INNER JOIN user ON wallet.user_id = user.id
        WHERE wallet.id = ?';
        $result = $this->createQuery($sql, [$wallet_id]);
        $wallet = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($wallet);
    }

    public function edit_wallet(Parameter $post, $articleId, $userId)
    {

    }

    public function delete_wallet($wallet_id)
    {
        $sql = 'DELETE FROM wallet_has_coins WHERE wallet_id = ?';
        $this->createQuery($sql, [$wallet_id]);
        $sql = 'DELETE FROM wallet WHERE id = ?';
        $this->createQuery($sql, [$wallet_id]);
    }

    /* TEST */

    public function getWalletsId($wallets)
    {
        $wallets_id = [];
        foreach($wallets as $wallet)
        {
            $wallets_id[] = $wallet->getId(); 
        }
        return $wallets_id;
    }

}