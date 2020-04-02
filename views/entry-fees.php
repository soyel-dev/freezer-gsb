<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: /');
    exit();
}

$current_page = 'entry-fees';

$title = 'Saisie des notes de frais';

use App\Connection;

$pdo = Connection::getPDO();

if (!empty($_POST)) {
    $fraisforfait = htmlspecialchars($_POST['fraisforfait']);
    $quantite = htmlspecialchars($_POST['quantite']);
    if (!empty($_POST['fraisforfait']) && !empty($_POST['quantite'])) {
        $query = $pdo->prepare("INSERT INTO lignefraisforfait SET quantite = ?, idFraisForfait = ?, idFF = ?");
        $query->execute([$quantite, $fraisforfait, $params['idFicheF']]);
        $success = true;
    } else {
        $errors['empty'] = "Tous les champs doivent être complétés";
    }
}

?>

<div class="jumbotron">
    <div class="container">
        <h1><?= $title ?></h1>
        <h3 class="text-muted">Saisissez vos notes de frais pour la fiche n° <?= $params['idFicheF'] ?></h3>
    </div>
</div>

<div class="container">
    <?php if (isset($success) && $success === true) : ?>
        <div class="alert alert-success text-center">
            Votre saisie de note de frais a bien été enregistré dans la fiche n° <?= $params['idFicheF'] ?>. Voulez-vous <a href="<?= $router->url('affichage_des_frais', ['idFicheF' => $params['idFicheF']]) ?>">afficher vos notes de frais</a> ?
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
        <div class="form-group">
            <select class="custom-select" id="fraisforfait" name="fraisforfait" required>
                <option value="" selected>Sélectionnez vos frais pour la fiche n° <?= $params['idFicheF'] ?></option>
                <option value="ETP">Forfait étape</option>
                <option value="KM">Frais kilométrique</option>
                <option value="NUI">Nuitée hôtel</option>
                <option value="REP">Restauration</option>
            </select>
        </div>

        <div class="input-group mb-2 mr-sm-2">
            <input type="number" class="form-control" id="quantite" name="quantite" placeholder="Saisissez la quantité du frais sélectionner" required>
            <div class="input-group-prepend">
                <div class="input-group-text">quantités</div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-primary btn-block">Valider</button>
    </form>
</div>