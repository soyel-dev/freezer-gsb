<?php
require '../vendor/autoload.php';

$router = new App\Router(dirname(__DIR__) . '/views');

$router
    ->get('/', 'home', 'accueil')
    ->get('/deconnexion', 'logout', 'deconnexion')
    ->get('/404', 'error404', 'erreur_404')
    ->get('/frais/fiche-[*:idFicheF]/supprimer-[i:id]', 'delete', 'suppression_frais')
    ->match('/connexion', 'login', 'connexion')
    ->match('/inscription', 'register', 'inscription')
    ->match('/profil', 'profil', 'profil')
    ->match('/frais/nouvelle-fiche', 'new-card', 'nouvelle_fiche_frais')
    ->match('/frais/fiche', 'list-card', 'liste_fiches')
    ->match('/frais/fiche-[*:idFicheF]/saisie-des-frais', 'entry-fees', 'saisie_des_frais')
    ->match('/frais/fiche-[*:idFicheF]/', 'display-fees', 'affichage_des_frais')
    ->match('/frais/fiche-[*:idFicheF]/edition-[i:id]', 'edit-fees', 'edition_des_frais')
    ->run();