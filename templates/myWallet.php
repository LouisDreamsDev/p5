<?php $this->title = 'Mes portefeuilles'; ?>
<?= $this->session->show('new_wallet'); ?>
<?= $this->session->show('edit_wallet'); ?>
<?= $this->session->show('delete_wallet'); ?>

<div id="global-wallet">

<?php 

foreach($wallets as $wallet)
{
    d($wallet);
    ?>
    <div class="card">
        <div class="card-title">
            <h2><?= $wallet->getTitle(); ?></h2>
            <em><?= $wallet->getLastModified(); ?></em>
        </div>
        <div class="card-body">
            <?php
            foreach($wallet->getWalletHasCoins() as $whc)
            {
                ?>
                <li><?php  // d($coins) ?></li>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
?>

</div>


