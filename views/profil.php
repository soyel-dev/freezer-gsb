<?php
session_start();

if(!isset($_SESSION['login'])) {
    header('Location: /');
    exit();
}

$current_page = 'profil';

$title = 'Profil';

use App\Connection;
use App\Model\Member;

$pdo = Connection::getPDO();

$query = $pdo->prepare("SELECT * FROM visiteur WHERE login = ?");
$query->execute([$_SESSION['login']]);
$query->setFetchMode(PDO::FETCH_CLASS, Member::class);
$member = $query->fetch();

$_SESSION['prenom'] = $member->getPrenom();
?>

<div class="jumbotron">
    <div class="container">
        <h1><?= $title ?></h1>
        <h3 class="text-muted">Bienvenue <?= $member->getPrenom() . ' ' . $member->getNom(); ?></h2>
    </div>
</div>

<div class="container">
    <div class="row mb-5">
        <div class="btn-group col">
            <a class="btn btn-success col-6" href="/frais/nouvelle-fiche">Nouvelle fiche de frais</a>
            <a class="btn btn-dark col-6" href="/frais/fiche">Affichage des fiches de frais</a>
        </div>
    </div>
    <div class="form-row form-group">
        <div class="col-lg-6">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $member->getPrenom() ?>" readonly>
        </div>
        <div class="col-lg-6">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= $member->getNom() ?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="adresse">Adresse</label>
        <input type="text" class="form-control" id="adresse" name="adresse" value="<?= $member->getAdresse() ?>" readonly>
    </div>
    <div class="form-row form-group">
        <div class="col-lg-4">
            <label for="cp">Code postal</label>
            <input type="text" class="form-control" id="cp" name="cp" value="<?= $member->getCp() ?>" readonly>
        </div>
        <div class="col-lg-8">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" value="<?= $member->getVille() ?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="login">Identifiant</label>
        <input type="text" class="form-control" id="login" name="login" value="<?= $member->getLogin() ?>" readonly>
    </div>
    <div class="form-group">
        <label for="dateEmbauche">Date d'embauche</label>
        <input type="text" class="form-control" id="dateEmbauche" name="dateEmbauche" value="<?= $member->getDateEmbauche() ?>" readonly>
    </div>
    <a class="btn btn-outline-primary btn-block" href="#">Modifier mon profil</a>
</div>