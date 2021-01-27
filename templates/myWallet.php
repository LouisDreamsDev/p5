<?php $this->title = 'Mes portefeuilles'; ?>
<?= $this->session->show('createWallet'); ?>
<?= $this->session->show('editWallet'); ?>
<?= $this->session->show('deleteWallet'); ?>

<div id="global-wallet">

<?php 

foreach($wallets as $wallet)
{
    // d($wallet);
    ?>
    <div class="card">
        <div class="card-title">
            <h2><a href="../public/index.php?route=editWallet&walletId=<?= $wallet->getId(); ?>"><?= $wallet->getTitle(); ?></a></h2>
            <em><?= $wallet->getLastModified(); ?></em>
        </div>
        <div class="card-body">
            <?php
            foreach($wallet->getWalletHasCoins() as $whc)
            {
                ?>
                <li><?php var_dump($wallet->getWalletHasCoins()) ?></li>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
?>

</div>


