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
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
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