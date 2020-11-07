<?php $this->title = 'Article'; ?>
<div class="card text-center">
    <div class="card-header">
        <h2><?= htmlspecialchars($article->getTitle());?></h2>
    </div>
    <div class="card-body">
        <div class="card-text text-justify"><?= $article->getContent();?></div>
    </div>
    <div class="card-footer text-muted">
        <em>Posté le : <?= htmlspecialchars($article->getCreatedAt());?> par <?= htmlspecialchars($article->getAuthor());?></em>
    </div>
    <?php
    if ($this->session->get('role') === 'admin')
    {
        ?>
        <div class="actions card-footer d-flex justify-content-end">
            <a class="btn btn-outline-info" href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
            <a class="btn btn-danger" href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
        </div>
    <?php
    }
    ?>
</div>
<br>
<div id="comments">
    <hr>
    <h3 class="text-center">Commentaires</h3>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <div class="card">
            <div class="card-header">
                <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
            </div>
            <div class="card-body">
                <p><?= htmlspecialchars($comment->getContent());?></p>
                <em class="text-muted">Posté le <?= htmlspecialchars($comment->getCreatedAt());?></em>
                <div class="signal-comment">
                    <?php
                    if($comment->isFlag()) {
                        ?>
                        <p class="alert alert-warning">Ce commentaire a déjà été signalé.</p>
                        <?php
                    } 
                    else 
                    {
                        ?>
                        <p><a class="btn btn-warning" href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
                        <?php
                    }
                    ?>
                    <?php
                    if ($this->session->get('role') === 'admin')
                    {
                        ?>
                        <div class="actions card-footer d-flex justify-content-end">
                            <a class="btn btn-outline-success" href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">Désignaler</a>
                            <a class="btn btn-outline-secondary" href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Modifier</a>
                            <a class="btn btn-danger" href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <br>
    <?php    
    }
    ?>
    <br>
    <h4 class="text-center"><u>Ajouter un commentaire</u></h4>
    <?php
    if ($this->session->get('pseudo')) 
    {
        include('form_comment.php');
    }
    else
    {
        ?>
        <em>vous devez être connecté pour poster un commentaire.</em>
        <br>
        <a href="../public/index.php?route=login" class="btn btn-light border">Connexion</a>
        <a href="../public/index.php?route=register" class="btn btn-light border">Inscription</a>
        <?php
    }
    ?>
</div>