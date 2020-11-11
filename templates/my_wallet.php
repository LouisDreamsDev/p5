<?php $this->title = 'Mon portefeuille'; ?>
<?= $this->session->show('new_wallet'); ?>

<h3 class="text-center py-4 alert alert-primary">Mon Portefeuille</h3>

<div id="global-wallet">
    <?php
        foreach($wallet as $my_wallet)
        {
        ?>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="my-0 py-0 alert alert-primary"><?= $my_wallet->getTitle(); ?></h4>
                    <span>icon modify</span>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach ($wallet as $choices)
                        {
                            ?>
                            <li class="list-group-item"><?= $choices->getSymbol(); ?></li>
                            <?php    
                        }
                        ?>
                        <div class="card-footer d-flex justify-content-between">
                            <p id="wallet_total" class="card-text my-0">total :</p>
                            <span><strong><?= '$sum' ?></strong></span>
                        </div>
                    </ul>
                </div>
            </div>
        <?php
        }
    ?>
</div>
<?php

