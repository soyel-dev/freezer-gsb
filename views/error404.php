<?php
session_start();

$title = 'Erreur 404';
?>

<div class="jumbotron text-center">
    <h1 class="text-danger"><?= $title ?></h1>
    <h3 class="text-muted">Une erreur s'est produite...</h3>
</div>

<div class="container">
    <div class="display-1 text-center text-danger mb-5">
        <i class="fas fa-cogs"></i>
    </div>
    <a class="btn btn-outline-danger btn-block" href="/">Retourner à l'accueil ?</a>
</div>