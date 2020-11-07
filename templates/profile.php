<?php $this->title = 'Mon profil'; ?>

<?= $this->session->show('update_password'); ?>
<div class="card">
    <h2 class="card-header"><?php if ($this->session->get('pseudo') === 'user0') echo 'Jean Forteroche'; ?></h2>
    <p class="alert alert-info">Rôle : <strong><?= $this->session->get('role'); ?></strong></p>
    <div class="actions d-flex justify-content-end">
        <a id="profile-actions" class="btn btn-outline-secondary" href="../public/index.php?route=updatePassword">Modifier le mot de passe</a>
        <a class="btn btn-danger" href="../public/index.php?route=deleteAccount">Supprimer le compte</a>
    </div>
</div>
<br>