<?php $this->title = 'Édition du portefeuille'; ?>
<?= $this->session->show('editWallet'); ?>
<?php $walletId = $post->get('id'); ?>
<form class="form-t2" id="editWallet" method="post" action="../public/index.php?route=editWallet&walletId=<?= $walletId ?>">
    <div class="form-group">
        <label for="wallet_title">Titre du portefeuille</label>
        <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($post->get('title')); ?>">
        <?= isset($errors['title']) ? $errors['title'] : ''; ?>
        <br>
        <label for="coins">Pièces</label>
        <br>
        <ul class="list-group">
        <?php
        $sum = null;
        foreach($walletHasCoins as $walletHasCoin) 
        {
            d($walletHasCoin->getWhcId());
            $sum += $walletHasCoin->getCoinPrice() * $walletHasCoin->getCoinQuantity();
            ?>
            <li class="list-group-item border-bottom d-flex">
                <span class="mt-1"><strong class="text-success"><?= $walletHasCoin->getCoinSymbol(); ?></strong> &#8771 <?= $walletHasCoin->getCoinPrice(); ?> x <?= $walletHasCoin->getCoinQuantity(); ?> = <?= $sum ?>&euro; </span>
                <div class="ml-auto">
                    <input type="hidden" name="whcId" value="<?= $walletHasCoin->getWhcId(); ?>">
                    <input type="number" value="<?= $walletHasCoin->getCoinQuantity(); ?>" name="coinQuantity" min="0" max="100">
                    <a class="text-danger" href="../public/index.php?route=deleteCoinFromWallet&walletId<?= $walletId ?>&coinId=<?= $walletHasCoin->getCoinId(); ?>">delete asset</a>
                </div>
            </li>
        </ul>
        <?php
        }
        ?>
        <input class="mt-3 btn btn-primary" type="submit" value="Mettre à jour" name="submit">
    </div>
</form>