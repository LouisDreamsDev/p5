<?php $this->title = 'Modification du portefeuille'; ?>
<form method="post" action="../public/index.php?route=update_wallet&wallet_id=<?= $post->get('id'); ?>">
    <div class="form-group">
        <label for="pseudo">Titre</label>
        <br>
        <input type="text" class="form-control" name="pseudo" value="<?= htmlspecialchars($post->get('title')); ?>">
        <br>
        <!-- foreach coins ? -->
    </div>
</form>