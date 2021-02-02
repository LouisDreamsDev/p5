<?php $this->title = 'Accueil'; ?>

<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('delete_account'); ?>
<div id="home">
    <h2 class="text-center py-4 alert alert-primary">Bienvenue sur Wallet(x) !</h2>
    <hr>

    <div id="spinner" class="spinner"></div>

    <div id="myData" class="">

    </div>

</div>



<script src="../public/js/HomeClass.js"></script>
<script src="../public/js/main.js"></script>