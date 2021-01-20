<?php 

namespace App\src\DAO;

use App\src\model\Wallet;

use App\config\Parameter;

use App\src\DAO\WalletHasCoinsDAO;

use App\src\DAO\CoinDAO;

class WalletDAO extends DAO

{
    private function buildObject($row)
    {
        $wallet = new Wallet();
        $wallet->setId($row['id']);
        $wallet->setTitle($row['title']);
        $wallet->setLastModified($row['lastEdit']);
        return $wallet;
    }

    public function getWalletsFromUser($userId)
    {
        $sql = 'SELECT 
        wallet.id, wallet.title, wallet.lastEdit, 
        wallet_has_coins.walletId, wallet_has_coins.coinId, wallet_has_coins.coinQuantity, 
        coins.id as coinId, coins.coinName, coins.symbol, coins.slug, coins.maxSupply, coins.circulatingSupply, coins.totalSupply, coins.cmcRank, coins.lastUpdated, coins.price, coins.volume24h, coins.percentChange1h, coins.percentChange24h, coins.percentChange7d, coins.marketCap
        FROM wallet
        LEFT JOIN wallet_has_coins on wallet.id = wallet_has_coins.walletId
        LEFT JOIN coins on wallet_has_coins.coinId = coins.id
        WHERE wallet.userId = ?';
        $result = $this->createQuery($sql, [$userId]);
        $wallets = [];
        foreach ($result as $row)
        {
            // d($row);
            $walletId = $row['id'];
            $wallets[$walletId] = $this->buildObject($row);
            
            $objWalletHasCoinsDAO = new WalletHasCoinsDAO();
            $walletHasCoinModel = $objWalletHasCoinsDAO->buildObject($row);

            $objCoinDAO = new CoinDAO();
            $useCoinModel = $objCoinDAO->buildObject($row);
            
            $walletHasCoinModel->setCoins($useCoinModel);
            $wallets[$walletId]->addWalletHasCoins($walletHasCoinModel);
        }
        $result->closeCursor();
        return $wallets;
    }

    public function getWallet($walletId)
    {
        $sql = 'SELECT wallet.id, wallet.title, wallet.lastEdit, wallet.userId
        FROM wallet
        INNER JOIN user ON wallet.userId = user.id
        WHERE wallet.id = ?';
        $result = $this->createQuery($sql, [$walletId]);
        $wallet = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($wallet);
    }

    public function createWallet()
    {
        
    }

    public function editWallet(Parameter $post, $walletId, $userId)
    {
        $sql = 'UPDATE wallet SET title=:title, lastEdit=NOW(), userId=:userId WHERE id=:walletId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'userId' => $userId,
            'walletId' => $walletId
        ]);
    }

    public function deleteWallet($walletId)
    {
        $sql = 'DELETE FROM wallet_has_coins WHERE walletId = ?';
        $this->createQuery($sql, [$walletId]);
        $sql = 'DELETE FROM wallet WHERE id = ?';
        $this->createQuery($sql, [$walletId]);
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