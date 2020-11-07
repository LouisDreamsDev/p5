<?php $this->title = 'Administration'; ?>
<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('unflag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('delete_user'); ?>
<h2 class="alert alert-info text-center text-muted">Articles</h2>
<a href="../public/index.php?route=addArticle">Nouvel article</a>
<table class="table table-bordered">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Titre</th>
        <th scope="col">Contenu</th>
        <th scope="col">Auteur</th>
        <th scope="col">Date</th>
        <th scope="col">Actions</th>
    </tr>
    <?php
    foreach ($articles as $article)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($article->getId());?></td>
            <td><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></td>
            <td><?= substr($article->getContent(), 0, 50);?></td>
            <td><?= htmlspecialchars($article->getAuthor());?></td>
            <td>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></td>
            <td class="d-flex justify-content-end">
                <a class="btn btn-outline-secondary mr-1" href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
                <a class="btn btn-danger" href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<h2 class="alert alert-info text-center text-muted">Commentaires signalés</h2>
<table class="table table-bordered">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Pseudo</th>
        <th scope="col">Message</th>
        <th scope="col">Date</th>
        <th scope="col">Actions</th>
    </tr>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($comment->getId());?></td>
            <td><?= htmlspecialchars($comment->getPseudo());?></td>
            <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150);?></td>
            <td>Créé le : <?= htmlspecialchars($comment->getCreatedAt());?></td>
            <td class="d-flex justify-content-end">
                <a class="btn btn-outline-success mr-1" href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">Désignaler</a>
                <a class="btn btn-danger" href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<h2 class="alert alert-info text-center text-muted">Utilisateurs</h2>
<table class="table table-bordered">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Pseudo</th>
        <th scope="col">Date</th>
        <th scope="col">Rôle</th>
        <th scope="col">Actions</th>
    </tr>
    <?php
    foreach ($users as $user)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($user->getId());?></td>
            <td><?= htmlspecialchars($user->getPseudo());?></td>
            <td>Créé le : <?= htmlspecialchars($user->getCreatedAt());?></td>
            <td><?= htmlspecialchars($user->getRole());?></td>
            <td class="d-flex justify-content-end">
                <?php
                if($user->getRole() != 'admin') {
                ?>
                <a class="btn btn-danger mr-1" href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer</a>
                <?php }
                else {
                    ?>
                <span class="border border-danger p-2">Suppression impossible !<span>
                <?php
                }
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>