<?php $this->title = "Connexion"; ?>

<?= $this->session->show('errorLogin'); ?>
<?= $this->session->show('needLogin'); ?>

<form method="post" action="../public/index.php?route=login">
    <div id="loginForm" class="form-group userForm">
        <div id="loginPseudo" class="container">
            <label class="" for="pseudo">Pseudo</label>
            <input class="form-control" type="text" id="loginPseudoInput" name="pseudo">
        </div>
        <br>
        <div id="loginMotDePasse" class="container">
            <label for="password">Mot de passe</label>
            <input class="form-control" type="password" id="password" name="password"><br>
        </div>
        <br>
        <input class="btn btn-primary d-flex justify-content-center submit" type="submit" value="Connexion" name="submit">
    </div>
</form>

