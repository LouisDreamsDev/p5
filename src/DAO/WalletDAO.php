<?php 

namespace App\src\DAO;

use App\src\model\Wallet;

use App\src\model\WalletHasCoins;

use App\src\model\Coin;

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
        /* faire les jointures ici : left join de walletHasCoins left join de coins */
        $sql = 'SELECT wallet.id, wallet.title, wallet.lastEdit, wallet_has_coins.walletId, wallet_has_coins.coinId, wallet_has_coins.coinQuantity, coins.id, coins.coinName, coins.symbol, coins.slug, coins.maxSupply, coins.circulatingSupply, coins.totalSupply, coins.cmcRank, coins.lastUpdated, coins.price, coins.volume24h, coins.percentChange1h, coins.percentChange24h, coins.percentChange7d, coins.marketCap
        FROM wallet
        LEFT JOIN wallet_has_coins on wallet.id = wallet_has_coins.walletId
        LEFT JOIN coins on wallet_has_coins.coinId = coins.id
        WHERE wallet.userId = ?';
        $result = $this->createQuery($sql, [$userId]);
        $wallets = [];
        foreach ($result as $row)
        {
            !d($row);
            $walletId = $row['id'];
            $wallets[$walletId] = $this->buildObject($row);

            /* creation d'un objet walletHasCoins */
            $objWalletHasCoinsDAO = new WalletHasCoinsDAO();
            $useWalletHasCoinsDAO = $objWalletHasCoinsDAO->buildObject($row); 
            !d($useWalletHasCoinsDAO);      
            $wallets[$walletId]->addWalletHasCoins($useWalletHasCoinsDAO);

            /* creation objet coin */
            $objCoinDAO = new CoinDAO();
            $useCoinDAO = $objCoinDAO->buildObject($row);
            !d($useCoinDAO);      
            $wallets[$walletId]->addCoins($useCoinDAO); 
        }
        $result->closeCursor();
        return $wallets;
    }

    public function get_wallet($walletId)
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

    public function add_wallet()
    {
        
    }

    public function edit_wallet(Parameter $post, $walletId, $userId)
    {
        $sql = 'UPDATE wallet SET title=:title, lastEdit=NOW(), userId=:userId WHERE id=:walletId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'userId' => $userId,
            'walletId' => $walletId
        ]);
    }

    public function delete_wallet($walletId)
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