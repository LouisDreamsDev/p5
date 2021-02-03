<?php $this->title = "Inscription"; ?>

<form method="post" action="../public/index.php?route=register">
    <div id="registerForm" class="form-group userForm">
        <div class="container" id="registerPseudo">
            <label for="pseudo">Pseudo</label>
            <input class="form-control" type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>">
            <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        </div>
        <br>
        <div class="container" id="registerMail">
            <label for="mail">Mail</label>
            <input class="form-control" type="mail" id="mail" name="mail">
        </div>
        <br> 
        <div class="container" id="registerMotDePasse">
            <label for="password">Mot de passe</label>
            <input class="form-control" type="password" id="password" name="password">
            <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        </div>
        <br>
        <div class="container" id="registerConfirmationMotDePasse">
            <label for="password">Confirmation du mot de passe</label>
            <input class="form-control "type="password" id="password" name="confirm_password">
            <?= isset($errors['password_confirm']) ? $errors['password_confirm'] : ''; ?>
        </div>
        <br>
        <div class="container d-flex justify-content-center">
            <input class="btn btn-primary submit" type="submit" value="Inscription" id="submit" name="submit">
        </div>
    </div>
</form>
