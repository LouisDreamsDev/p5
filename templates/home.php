<?php $this->title = 'Accueil'; ?>

<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('delete_account'); ?>
<div id="home">
    <h2 class="text-center py-4 alert alert-primary">Bienvenue sur Wallet(x) !</h2>
    <hr>
    <form id="home-cards" action="../public/index.php?route=mywallet" method="get" class="d-flex flex-wrap justify-content-around">
        <?php
        foreach ($coins as $coin) {
        ?>
            <div class="card border-primary mb-3">
                <div class="card-header bd-highlight mb-3">
                    <div class="card-subheader1 d-flex alert alert-light">
                            <h4 class="card-title m-0 text-primary"><?= $coin->getCoinName(); ?></h4>
                    </div>
                    <hr class="m-2">
                    <div class="pl-4 pr-3 card-subheader2 d-flex justify-content-between">
                        <em class="card-subtitle m-0"><?= $coin->getSymbol(); ?></em>
                        <span class="">&#8771 <strong><?= $coin->getPrice(); ?> &euro;</strong></span>
                    </div>
                </div>
                <div class="card-body pl-4 pr-4 pb-0 pt-0 mb-3">
                    <div class="card-text">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item border-bottom d-flex justify-content-between">
                                <span class="text-nowrap">Offre en circulation :</span> 
                                <span class="text-nowrap"><?= $coin->getCirculatingSupply(); ?> <?= $coin->getSymbol(); ?></span>
                            </li>
                            <li class="list-group-item border-bottom d-flex justify-content-between">
                                <span class="text-nowrap">Offre totale :</span> 
                                <span class="text-nowrap"><?= $coin->getTotalSupply(); ?> <?= $coin->getSymbol(); ?></span>
                            </li>
                            <li class="list-group-item border-bottom d-flex justify-content-between">
                                <span class="text-nowrap">Offre max :</span> 
                                <span class="text-nowrap">
                                <?php if ($coin->getMaxSupply() !== 'Non définie par le protocole') {echo $coin->getMaxSupply().' '.$coin->getSymbol();} else {echo $coin->getMaxSupply().' '.$coin->getCoinName();} ?>
                            </li>
                            <li class="list-group-item border-bottom d-flex justify-content-between">
                                <span class="text-nowrap">Volume / 24h :</span> 
                                <span class="text-nowrap"><?= $coin->getVolume24h(); ?>&euro;</span>
                            </li>
                            <li class="list-group-item border-bottom d-flex justify-content-between">
                                <span class="text-nowrap">Fluctuation (%) / 1h :</span> 
                                <span class="text-nowrap"><?= $coin->getPercentChange1h(); ?>%</span>
                            </li>
                            <li class="list-group-item border-bottom d-flex justify-content-between">
                                <span class="text-nowrap">Fluctuation (%) / 24h :</span> 
                                <span class="text-nowrap"><?= $coin->getPercentChange24h(); ?>%</span>
                            </li>
                                <li class="list-group-item border-bottom d-flex justify-content-between">
                                    <span class="text-nowrap">Fluctuation (%) / 7d :</span> 
                                    <span class="text-nowrap"><?= $coin->getPercentChange7d(); ?>%</span>
                            </li>
                            <li class="list-group-item border-bottom d-flex justify-content-between">
                                <span class="text-nowrap">Capital du marché :</span> 
                                <span class="text-nowrap"><?= $coin->getMarketCap(); ?>&euro;</span>
                            </li>
                            <li class="list-group-item border-bottom d-flex justify-content-between">
                                <span class="text-nowrap">actualisé le :</span> 
                                <span class="text-nowrap"><?= $coin->getLastUpdated(); ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer mt-4">
                        Quelque chose
                    </div>
                </div>
        </div>
        <?php
        }
        ?>
    </form>
</div>