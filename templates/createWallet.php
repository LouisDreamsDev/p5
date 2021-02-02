<?php $this->title = 'Nouveau portefeuille'; ?>
<form class="form-t2" id="createWallet" method="post" action="../public/index.php?route=createWallet">
    <div class="form-group">
        <label for="walletTitle">Titre du nouveau portefeuille</label>
        <input type="text" class="form-control" name="walletTitle" value="">
        <?= isset($errors['title']) ? $errors['title'] : ''; ?>
        <br>
        <label for="coins">Pièces</label>
        <br>
        <h2>Choississez les pièces de votre portefeuille: </h2>
        <div id="createWalletContainter" class="d-flex justify-content-center align-content-center flex-wrap">
            <?php
                $id = 0;
                foreach($coins as $coin) 
                {
                    ?>
                    <div class="custom-control custom-switch mr-4">
                        <input type="checkbox" name="coins[]" value="<?= $coin->getId() ?>" class="custom-control-input" id="btn-check<?= $id ?>" autocomplete="off">
                        <label class="custom-control-label" for="btn-check<?= $id ?>"><?= $coin->getCoinName() ?></label>
                    </div>
                    
                    <?php
                    $id++;
                }
        ?>
        </div>
        </select>
        <input class="mt-3 btn btn-primary" type="submit" value="Créer" name="submit">
    </div>
</form>