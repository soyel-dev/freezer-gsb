<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: /');
    exit();
}

$current_page = 'display-fees';

$title = 'Affichage des fiches';

use App\Connection;
use App\Model\Card;

setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR', 'fr', 'fr', 'fra', 'fr_FR@euro');

$pdo = Connection::getPDO();
$query = $pdo->query("SELECT * FROM fichefrais WHERE idVisiteur = '" .$_SESSION['id']. "' AND etat = 'CR'");
$cards = $query->fetchAll(PDO::FETCH_CLASS, Card::class);
?>

<div class="jumbotron">
    <div class="container">
        <h1><?= $title ?></h1>
        <h3 class="text-muted">Voici vos fiches de frais <?= $_SESSION['prenom'] ?></h3>
    </div>
</div>

<div class="container">
    <div class="table-responsive">
        <table class="table text-center">
            <thead class="thead-light">
                <tr>
                    <th>ID fiche</th>
                    <th>Mois</th>
                    <th>Montant total</th>
                    <th>État</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cards as $card) : ?>
                    <tr>
                        <th><?= $card->getID() ?></th>
                        <th class="text-capitalize"><?= $card->getMois() ?></th>
                        <th>
                            <?php
                            $query = $pdo->query("SELECT SUM(quantite*montant) as total FROM fraisforfait INNER JOIN lignefraisforfait ON lignefraisforfait.idFraisForfait = fraisforfait.id AND lignefraisforfait.idFF ='" .$card->getID(). "'");
                            $total = $query->fetch(PDO::FETCH_ASSOC);
                            echo $total['total'] . " €";
                            ?>
                        </th>
                        <th><?= $card->getEtatFormatted() ?></th>
                        <th>
                            <a class="btn btn-primary" href="<?= $router->url('affichage_des_frais', ['idFicheF' => $card->getID()]) ?>" title="Consulter cette fiche"><i class="far fa-eye pr-2"></i>Consulter</a>
                        </th>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>