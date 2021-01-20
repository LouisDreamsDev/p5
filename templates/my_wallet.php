<?php

use App\src\model\Wallet;

$this->title = 'Mes portefeuilles'; ?>
<?= $this->session->show('new_wallet'); ?>
<?= $this->session->show('edit_wallet'); ?>
<?= $this->session->show('delete_wallet'); ?>

<div id="global-wallet">

<?php 

foreach($wallets as $wallet)
{
    d($wallet);
    foreach($wallet->getWalletHasCoins() as $whc)
    {
        d($whc);
        echo $whc->getCoins()->getSymbol();
    }
}
?>

</div>


