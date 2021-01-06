<?php $this->title = "Connexion"; ?>

<?= $this->session->show('error_login'); ?>
<?= $this->session->show('need_login'); ?>

<form method="post" action="../public/index.php?route=login">
    <div class="form-group">
        <label for="pseudo">Pseudo</label><br>
        <input class="form-control" type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <label for="password">Mot de passe</label><br>
        <input class="form-control"type="password" id="password" name="password"><br>
        <input class="btn btn-primary" type="submit" value="Connexion" id="submit" name="submit">
    </div>
</form>

