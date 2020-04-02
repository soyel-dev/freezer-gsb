<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: /');
    exit();
}

$current_page = 'display-fees';

$title = 'Affichage des frais';

use App\Connection;
use App\Model\Fees;

setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR', 'fr', 'fr', 'fra', 'fr_FR@euro');

$pdo = Connection::getPDO();
$query = $pdo->query("SELECT * FROM lignefraisforfait WHERE idFF = '".$params['idFicheF']."'");
$fees = $query->fetchAll(PDO::FETCH_CLASS, Fees::class);
?>

<div class="jumbotron">
    <div class="container">
        <h1><?= $title ?></h1>
        <h3 class="text-muted">Voici vos notes de frais <?= $_SESSION['prenom'] ?></h3>
    </div>
</div>

<div class="container">
    <div class="row mb-5">
        <div class="btn-group col">
            <a class="btn btn-success col-6" href="<?= $router->url('saisie_des_frais', ['idFicheF' => $params['idFicheF']]) ?>">Ajouter des frais</a>
            <a class="btn btn-dark col-6" href="/frais/fiche">Affichage des fiches de frais</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table text-center">
            <thead class="thead-light">
                <tr>
                    <th>Frais</th>
                    <th>Quantité</th>
                    <th>Montant total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fees as $fee) : ?>
                    <tr>
                        <th><?= $fee->getIdFraisForfaitFormatted() ?></th>
                        <th><?= $fee->getQuantite() ?> quantité(s)</th>
                        <th>
                            <?php
                            $query = $pdo->query("SELECT montant FROM fraisforfait WHERE id ='" .$fee->getIdFraisForfait(). "'");
                            $montant = $query->fetch(PDO::FETCH_ASSOC);
                            echo ($montant['montant']*$fee->getQuantite()). " €";
                            ?>
                        </th>
                        <th>
                            <a class="btn btn-primary" href="<?= $router->url('edition_des_frais', ['idFicheF' => $params['idFicheF'], 'id' => $fee->getID()]) ?>"><i class="far fa-edit pr-2"></i>Éditer</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#validateDelete"><i class="far fa-trash-alt pr-2"></i>Supprimer</button>
                            <div class="modal fade" id="validateDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Vous êtes sur le point de supprimer une note de frais, êtes-vous sûre de vouloir continuer ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <a class="btn btn-danger" href="<?= $router->url('suppression_frais', ['idFicheF' => $params['idFicheF'], 'id' => $fee->getID()]) ?>">Confirmer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>