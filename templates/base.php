<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <title><?= $title ?></title>
</head>
<body>
<script src="../public/js/jquery-3.5.1.min.js"></script>
<header>
    <nav class="navbar py-0 pr-0 navbar-expand-sm navbar-light d-flex justify-content-between border-bottom">
        <a id="main-logo"class="navbar-brand mt-2 pr-3 border-right border-primary" href="../public/index.php">
        <svg id="main-logo" width="24px" height="24px" viewBox="0 0 16 16" class="bi bi-wallet2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
        </svg>        
        <span class="h3">Wallet(<strong id="x-title">x</strong>)</span>
        </a>
        <div class="lx">
            <ul class="nav d-flex justify-content-between">
                <li class="nav-item border-bottom border-left"><a class="nav-link my-1 py-3" href="../public/index.php">Accueil</a></li>
                <li class="nav-item border-bottom border-left"><a class="nav-link my-1 py-3" href="../public/index.php?route=myWallet">Mes Portefeuilles</a></li>
                <li class="nav-item border-bottom border-left"><a class="nav-link my-1 py-3" href="../public/index.php?route=contact">Contact</a></li>
                <li class="nav-item border-bottom border-left"><a class="nav-link my-1 py-3" href="../public/index.php?route=login">Se Connecter</a></li>
                <li class="nav-item border-bottom border-left"><a class="nav-link my-1 py-3" href="../public/index.php?route=register">S'inscrire</a></li>
                <li class="nav-item border-bottom border-left"><a class="nav-link my-1 py-3" href="../public/index.php?route=refreshApi">Refresh</a></li>
            </ul>
        </div>
    </nav>
</header>
<div id="content">
    <h4 class="path-title text-center py-3 alert alert-primary"><?= $this->title ?></h4>
    <?= $content ?>
</div>
<footer>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../public/css/style.css">
</body>
</html>