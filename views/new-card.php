<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: /');
    exit();
}

$current_page = 'entry-fees';

$title = 'Création d\'une nouvelle fiche frais';

use App\Connection;

$pdo = Connection::getPDO();

setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR', 'fr', 'fr', 'fra', 'fr_FR@euro');

$idVisiteur = htmlspecialchars($_SESSION['id']);
$moisCours = htmlspecialchars(strftime("%B"));
$idFicheFrais = $idVisiteur.$moisCours;

$req = $pdo->prepare("SELECT * FROM fichefrais WHERE idVisiteur = ? AND id = ? AND mois = ?");
$req->execute([$idVisiteur, $idFicheFrais, $moisCours]);
$tablematch = $req->rowCount();
if($tablematch == 1) {
    header('Location: /frais/fiche');
    exit();
}

$created_at = date("Y-m-d H:i:s");

if (!empty($_POST)) {
    if (!empty($_POST['idVisiteur']) && !empty($_POST['moisCours'])) {
        $query = $pdo->prepare("INSERT INTO fichefrais SET id = ?, mois = ?, dateModif =?, idVisiteur = ?");
        $query->execute([$idFicheFrais, $moisCours, $created_at, $idVisiteur]);
        $success = true;
    } else {
        $errors['empty'] = "Tous les champs doivent être complétés";
    }
}

?>

<div class="jumbotron">
    <div class="container">
        <h1><?= $title ?></h1>
        <h3 class="text-muted">Créer une nouvelle fiche pour le mois en cours (<?= strftime("%B") ?>)</h3>
    </div>
</div>

<div class="container">
    <?php if (isset($success) && $success === true) : ?>
        <div class="alert alert-success text-center">
            <p>Votre création de fiche de frais a bien été enregistré. Voulez-vous <a href="/frais/fiche">afficher vos fiches</a> ?</p>
            <small class="text-muted">ID fiche frais : <?= $idFicheFrais ?></small>
        </div>
    <?php endif ?>
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger text-center alert-dismissible" role="alert">
            <?php foreach ($errors as $error) : ?>
                <li class="list-unstyled"><?php echo $error; ?></li>
            <?php endforeach; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>
    <form method="POST" action="">
        <div class="form-row form-group">
            <div class="col-lg-4">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $_SESSION['prenom'] ?>" readonly>
            </div>
            <div class="col-lg-4">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $_SESSION['nom'] ?>" readonly>
            </div>
            <div class="col-lg-4">
                <label for="idVisiteur">ID <?= $_SESSION['prenom']?></label>
                <input type="text" class="form-control" id="idVisiteur" name="idVisiteur" value="<?= $_SESSION['id'] ?>" readonly>
            </div>
        </div>
        <div class="form-row form-group">
            <div class="col-lg-4">
                <label for="idFicheFrais">ID fiche frais</label>
                <input type="text" class="form-control" id="idFicheFrais" name="idFicheFrais" value="<?= $idFicheFrais ?>" readonly>
            </div>
            <div class="col-lg-4">
                <label for="moisCours">Mois en cours</label>
                <input type="text" class="form-control text-capitalize" id="moisCours" name="moisCours" value="<?= strftime("%B") ?>" readonly>
            </div>
            <div class="col-lg-4">
                <label for="dateCours">Date du jour</label>
                <input type="text" class="form-control" id="dateCours" name="dateCours" value="<?= $created_at ?>" readonly>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-primary btn-block">Valider</button>
    </form>
</div>