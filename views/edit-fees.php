<?php
session_start();

if(!isset($_SESSION['login'])) {
    header('Location: /');
    exit();
}

use App\Connection;
use App\Model\Fees;

$id = (int) $params['id'];

$current_page = 'entry-fees';

$title = 'Édition note de frais n°' . $id;

$pdo = Connection::getPDO();
$query = $pdo->prepare("SELECT * FROM lignefraisforfait WHERE id = :id");
$query->execute(['id' => $id]);
$query->setFetchMode(PDO::FETCH_CLASS, Fees::class);
$fee = $query->fetch();

if ($fee === false) {
    /*throw new Exception('Aucune note de frais ne correspond à cet ID');*/
    header('Location: /404');
    exit();
}

if(!empty($_POST)) {
    $quantite = htmlspecialchars($_POST['quantite']);
    if(!empty($_POST['quantite'])) {
        $query = $pdo->prepare("UPDATE lignefraisforfait SET quantite = ? WHERE id = $id AND idFF = ?");
        $query->execute([$quantite, $params['idFicheF']]);
        $success = true;
    } else {
        $errors['empty'] = "Tous les champs doivent être complétés";
    }
}

?>

<div class="jumbotron">
    <div class="container">
        <h1><?= $title ?></h1>
    </div>
</div>

<div class="container">
    <div class="container">
        <?php if (isset($success) && $success === true) : ?>
            <div class="alert alert-success text-center">
                Votre saisie de note de frais a bien été modifié. Voulez-vous <a href="<?= $router->url('affichage_des_frais', ['idFicheF' => $params['idFicheF']]) ?>">afficher vos notes de frais</a> ?
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
                <label for="quantite">Modifiez votre notes de frais</label>
                <div class="input-group mb-2 mr-sm-2">
                    <input type="text" class="form-control" id="quantite" name="quantite" value="<?= $fee->getQuantite() ?>" required>
                    <div class="input-group-prepend">
                        <div class="input-group-text">quantités</div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-block">Valider</button>
        </form>
    </div>
</div>