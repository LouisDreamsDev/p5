<?php $this->title = 'Édition du portefeuille'; ?>
<form id="edit_wallet" method="post" action="../public/index.php?route=editWallet&walletId=<?= $post->get('id'); ?>">
    <div class="form-group">
        <label for="wallet_title">Titre du portefeuille</label>
        <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($post->get('title')); ?>">
        <?= isset($errors['title']) ? $errors['title'] : ''; ?>
        <label for="coins">Pièces</label>
        <ul class="list-group">
        <?php
        $sum = 0;
        foreach($coins as $coin) 
        {
            $sum += $coin->getCoinPrice() * $coin->getCoinQuantity();
            ?>
            <li class="list-group-item border-bottom d-flex">
                <span class="mt-1"><strong class="text-success"><?= $coin->getCoinSymbol(); ?></strong> &#8771 <?= $coin->getCoinPrice(); ?> &euro; x <?= $coin->getCoinQuantity(); ?></span>
                <div class="ml-auto">
                    <input type="hidden" name="coinId" value="<?= $coin->getCoinId(); ?>">
                    <input type="number" value="<?= $coin->getCoinQuantity(); ?>" name="coinQuantity" min="0" max="100">
                    <a class="text-danger" href="../public/index.php?route=deleteCoinFromWallet&coinId=<?= $coin->getCoinId(); ?>">
                    </a>
                </div>
            </li>
        </ul>
        <?php
        }
        ?>
        <input class="mt-3 btn btn-primary" type="submit" value="Mettre à jour" name="submit">
    </div>
</form>