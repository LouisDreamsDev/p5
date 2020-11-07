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
    <h1 class="py-4 text-center"><a href="../public/index.php">Wallet(x)</a></h1>
    <nav class="">
        <ul class="nav justify-content-around">
            <li><a class="nav-link" href="../public/index.php?route=mywallet">Mon portefeuille</a></li>
            <li><a class="nav-link" href="../public/index.php?route=login">Se connecter</a></li>
            <li><a class="nav-link" href="../public/index.php?route=register">S'inscrire</a></li>
            <li><a class="nav-link" href="">A propos</a></li>
            <li><a class="nav-link" href="../public/index.php?route=refreshApi">refresh</a></li>
        </ul>
    </nav>
    <hr>
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