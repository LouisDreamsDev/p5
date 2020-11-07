<?php
$route = isset($post) && $post->get('id') ? 'editComment' : 'addComment';
$submit = $route === 'addComment' ? 'Ajouter' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>&articleId=<?= htmlspecialchars($article->getId()); ?>">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <br>
        <input class="form-control" type="text" id="pseudo" name="pseudo" value="<?= $this->session->get('pseudo') ?>"readonly>
        <br>
        <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        <label for="content">Message</label><br>
        <textarea class="form-control" id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea>
        <br>
        <?= isset($errors['content']) ? $errors['content'] : ''; ?>
        <input class="btn btn-primary" type="submit" value="<?= $submit; ?>" id="submit" name="submit">
    </div>
</form>
