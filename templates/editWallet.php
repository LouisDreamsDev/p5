<?php $this->title = 'Édition du portefeuille'; ?>
<?= $this->session->show('editWallet'); ?>
<?php $walletId = $post->get('id'); ?>
<form id="editWallet" method="post" action="../public/index.php?route=editWallet&walletId=<?= $walletId ?>">
    <div class="form-group walletForm">
        <div class="container">
            <h4><label for="title">Titre du portefeuille</label></h4>
            <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($post->get('title')); ?>">
            <?= isset($errors['title']) ? $errors['title'] : ''; ?>
        </div>
        <br>
        <h4><label for="coins">Pièces</label></h4>
        <br>
        <div class="coinsContainer">
            <ul class="list-group">
            <?php
            $sum = null;
            $total = null;
            foreach($walletHasCoins as $walletHasCoin) 
            {
                $sum = $walletHasCoin->getCoinPrice() * $walletHasCoin->getCoinQuantity();
                $total += $sum;
                d($walletHasCoin->getWhcId());
                ?>
                <li class="list-group-item border-bottom d-flex">
                    <span class="mt-1"><strong class="text-success"><?= $walletHasCoin->getCoinSymbol(); ?></strong> &#8771 <?= $walletHasCoin->getCoinPrice(); ?> x <?= $walletHasCoin->getCoinQuantity(); ?> = <?= $sum ?>&euro; </span>
                    <div class="ml-auto">
                        <input type="hidden" name="whcId[]" value="<?= $walletHasCoin->getWhcId(); ?>">
                        <input type="number" value="<?= $walletHasCoin->getCoinQuantity(); ?>" name="coinQuantity" min="0" max="100">
                        <a class="text-danger" href="../public/index.php?route=deleteCoinFromWallet&walletId=<?= $walletHasCoin->getWalletId() ?>&whcId=<?= $walletHasCoin->getWhcId(); ?>">delete</a>
                    </div>
                </li>
                <?php
            }
            ?>
                <li class="list-group-item border-bottom d-flex">Total = <span class="ml-auto"><?= $total ?>&euro;</span></li>
            </ul>   
        </div>
        <br>
        <div id="editAddCoins">
            <div class="container">
                <p>pour ajouter des pièces à ce portefeuille <span class="btn btn-light mb-1" id="displayAddCoins">cliquez ici</span></p>
            </div>
            <div id="addCoinsOnEditContainer">
            <?php
            $id = 0;
            foreach($coins as $coin) 
            {
                ?>
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="coins[]" value="<?= $coin->getId() ?>" class="custom-control-input" id="btn-check<?= $id ?>" autocomplete="off">
                    <label class="custom-control-label" for="btn-check<?= $id ?>"><?= $coin->getCoinName() ?></label>
                </div>
                <?php
                $id++;
            }
            ?>
            </div>
        </div>
        <input id="submitButtonEditWallet" class="mt-4 btn btn-primary submit" type="submit" value="Mettre à jour" name="submit">
    </div>
</form>

<script src="../public/js/script.js"></script>
