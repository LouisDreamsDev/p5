<?php $this->title = 'Modifier le mot de passe'; ?>
<form method="post" action="../public/index.php?route=updatePassword">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <br>
        <input type="text" class="form-control" name="pseudo" value="<?=$this->session->get('pseudo'); ?>"readonly>
        <br>
        <label for="new-password">Nouveau mot de passe</label>
        <br>
        <input class="form-control"type="password" id="current-password" name="current-password">
        <br>
        <p class="alert alert-danger" role="alert">Attention ! Le mot de passe du compte <?= $this->session->get('pseudo'); ?> sera modifié !</p>
        <br>
        <input class="btn btn-primary" type="submit" value="Mettre à jour" id="submit" name="submit">
    </div>
</form>
