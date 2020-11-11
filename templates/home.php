<?php $this->title = 'Accueil'; ?>

<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('delete_account'); ?>
<div id="home">
    <h2 class="text-center my-4 alert alert-primary">Bienvenue sur Wallet(x) ! <br>La plateforme FR des statistiques globales du marché des cryptomonnaies !</h2>
    <hr>
    <form id="home-choices" action="../public/index.php?route=mywallet" method="get" class="d-flex flex-wrap justify-content-around">
        <?php
        foreach ($coins as $coin) {
        ?>
            <div class="card border-primary mb-3">
                <div class="card-header bd-highlight mb-3">
                    <div class="card-subheader1 d-flex">
                        <a href="">
                            <h4 class="card-title"><?= $coin->getCoin_name(); ?></h4>
                        </a>
                    </div>
                    <hr class="m-0">
                    <div class="card-subheader2 d-flex justify-content-between mt-2">
                        <em class="card-subtitle m-0"><?= $coin->getSymbol(); ?></em>
                        <span class="">&#8771 <strong><?= round($coin->getPrice(), 3); ?> &euro;</strong></span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <ul>
                            <li>max supply : <?= $coin->getMax_supply(); ?></li>
                            <li>last updated : <?= $coin->getLast_updated(); ?></li>
                        </ul>
                    </div>
                    <a class="card-link" href="">plus d'infos sur <?= $coin->getCoin_name(); ?></a>
                    <label for="checkbox">choisir</label>
                    <input type="checkbox">
                </div>
            </div>
        <?php
        }
        ?>
    </form>
</div>