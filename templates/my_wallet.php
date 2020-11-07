<?php $this->title = 'Mon portefeuille'; ?>
<?= $this->session->show('new_wallet'); ?>

<h3 class="text-center py-4 alert alert-primary">Mon Portefeuille</h3>

<div id="global-wallet">
    <?php
        foreach($wallets as $my_wallet)
        {
        ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="my-0"><?= $my_wallet->getTitle() ?></h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">l1</li>
                        <li class="list-group-item">n2</li>
                        <li class="list-group-item">c3</li>
                        <h5 class="card-footer">total : <?= 'a' ?></h5>
                    </ul>
                </div>
            </div>
        <?php
        }
    ?>
</div>
<?php

