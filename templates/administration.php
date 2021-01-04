<?php $this->title = 'Administration'; ?>
<?= $this->session->show('delete_user'); ?>

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