<?php $this->title = 'Nouveau portefeuille'; ?>
<form id="createWallet" method="post" action="../public/index.php?route=createWallet">
    <div class="form-group walletForm">
        <div class="container">
            <label for="walletTitle">Titre du nouveau portefeuille</label>
            <input type="text" class="form-control" name="walletTitle" value="">
        </div>
        <?= isset($errors['title']) ? $errors['title'] : ''; ?>
        <br>
        <h4 class="alert alert-primary pt-3"><label class="p-0" for="coins">Choississez les pièces de votre portefeuille:</label></h4>
        <br>
        <div id="createWalletContainter" class="d-flex justify-content-around align-content-around flex-wrap">
            <?php
                $id = 0;
                foreach($coins as $coin) 
                {
                    ?>
                    <div class="custom-control custom-switch my-4">
                        <input type="checkbox" name="coins[]" value="<?= $coin->getId() ?>" class="custom-control-input" id="btn-check<?= $id ?>" autocomplete="off">
                        <label class="custom-control-label" for="btn-check<?= $id ?>"><?= $coin->getCoinName() ?></label>
                    </div>
                    <?php
                    $id++;
                }
        ?>
        </div>
        <input class="mt-3 btn btn-primary submit" type="submit" value="Créer" name="submit">
    </div>
</form>