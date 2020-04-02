<?php

use App\Connection;

$pdo = Connection::getPDO();

$query = $pdo->prepare("DELETE FROM lignefraisforfait WHERE id =" .$params['id']);
$query->execute([$id]);

header('Location: ' .$router->url('affichage_des_frais', ['idFicheF' => $params['idFicheF']]) .'?delete=1');