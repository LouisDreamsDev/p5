<?php $this->title = "Inscription"; ?>

<h3 class="text-center py-4 alert alert-primary">S'inscrire</h3>

<form method="post" action="../public/index.php?route=register">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <br>
        <input class="form-control" type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>">

        <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        <br>
        <label for="mail">Mail</label>
        <input class="form-control" type="mail" id="mail" name="mail">
        <br> 
        <label for="password">Mot de passe</label>
        <input class="form-control" type="password" id="password" name="password">
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <br>
        <label for="password">Confirmation du mot de passe</label>
        <br>
        <input class="form-control "type="password" id="password" name="confirm_password">
        <?= isset($errors['password_confirm']) ? $errors['password_confirm'] : ''; ?>
        <br>
        <input class="btn btn-primary" type="submit" value="Inscription" id="submit" name="submit">
    </div>
</form>
