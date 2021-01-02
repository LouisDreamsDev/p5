<?php $this->title = 'Mes portefeuilles'; ?>
<?= $this->session->show('new_wallet'); ?>
<?= $this->session->show('edit_wallet'); ?>
<?= $this->session->show('delete_wallet'); ?>

<h3 class="text-center py-4 my-4 alert alert-primary">Mes Portefeuilles</h3>

<div id="global-wallet">
    <?php
        foreach($wallets as $wallet)
        {
        ?>
            <div class="card mb-4">
                <div class="card-header d-flex alert alert-info pb-0">
                    <a class="my-1 py-1 mr-auto" href="../public/index.php?route=edit_wallet&wallet_id=<?= $wallet->getId(); ?>"><h4 ><?= $wallet->getTitle(); ?></h4></a>
                    <a class="mr-3 mb-2 p-2" href="../public/index.php?route=edit_wallet&wallet_id=<?= $wallet->getId(); ?>">
                        <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-pen" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>
                    </a>
                    <a class="mr-1 mb-2 p-2 text-danger" href="../public/index.php?route=delete_wallet&wallet_id=<?= $wallet->getId(); ?>">
                        <svg width="1.2em" height="1.2em" padding="10px" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </a>
                </div>
                <div class="card-body">
                        <ul class="list-group">
                        <?php
                        $sum = 0;
                        foreach($wallet_content as $coins)
                        {
                            foreach($coins as $coin) 
                            //!d($coins);
                            {
                                $sum += $coin->getCoinPrice() * $coin->getCoinQuantity();
                            ?>
                            <li class="list-group-item border-bottom d-flex">
                                <span><strong class="text-success"><?= $coin->getCoinSymbol(); ?></strong> &#8771 <?= $coin->getCoinPrice(); ?> &euro; x <?= $coin->getCoinQuantity(); ?></span>
                                <div class="ml-auto">
                                    <a class="text-danger" href="../public/index.php?route=delete_coin_from_wallet&wallet_id=<?= $wallet->getId(); ?>&w_coin_id=<?= $coin->get_coin_id(); ?>">
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
                        }
                        ?>
                            <div class="card-footer mt-4 d-flex">
                                <p id="wallet_total" class="m-0">Total &#8771</p>
                                <span class="ml-auto"><strong><?= $sum ?>&euro;</strong></span>                      
                            </div>
                    </form>
                </div>
            </div>
        <?php
        }
    ?>
</div>
<?php

