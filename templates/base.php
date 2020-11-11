<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/style.css">
     <title><?= $title ?></title>
</head>
<body>
<header>
    <nav class="navbar py-0 pr-0 navbar-expand-sm navbar-light d-flex justify-content-between border-bottom">
        <a id="main-logo"class="navbar-brand pr-3 border-right border-primary" href="../public/index.php">
        <img src="../img/wallet_icon.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        <span class="h3">Wallet(<strong id="x-title">x</strong>)</span>
        </a>
        <div class="lx">
            <ul class="nav d-flex justify-content-between">
                <li class="nav-item border-bottom border-left"><a class="nav-link my-1 py-3" href="../public/index.php?route=my_wallet">Mon Portefeuille</a></li>
                <li class="nav-item border-bottom border-left"><a class="nav-link my-1 py-3" href="../public/index.php?route=refreshApi">Refresh</a></li>
                <li class="nav-item border-bottom border-left"><a class="nav-link my-1 py-3" href="../public/index.php?route=contact">Contact</a></li>
                <li class="nav-item border-bottom border-left"><a class="nav-link my-1 py-3" href="../public/index.php?route=login">Se connecter</a></li>
                <li class="nav-item border-bottom border-left"><a class="nav-link my-1 py-3" href="../public/index.php?route=register">S'inscrire</a></li>
            </ul>
        </div>
    </nav>
</header>
<div id="content">
    <?= $content ?>
</div>
<footer>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>