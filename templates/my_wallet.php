<?php $this->title = 'Mon portefeuille'; ?>
<?= $this->session->show('new_wallet'); ?>

<h3 class="text-center py-4 my-4 alert alert-primary">Mon Portefeuille</h3>

<div id="global-wallet">
    <?php
        foreach($wallet as $my_wallet)
        {
        ?>
            <div class="card">
                <div class="card-header d-flex justify-content-between alert alert-info">
                    <h4 class="my-1 py-1 text-primary"><?= $my_wallet->getTitle(); ?></h4>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen mt-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                    </svg>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach($a as $b)
                        {
                            ?>
                            <li class="list-group-item border-bottom d-flex justify-content-between"></li>                            
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

