<?php
session_start();

$current_page = 'home';

$title = 'Accueil';
?>

<div class="jumbotron text-center">
    <h1><?= $title ?></h1>
    <h3 class="text-muted">Découvrez Freezer, notre outil de gestion qui vous facilite les démarches pour les notes de frais</h3>
</div>

<div class="container">
    <div class="row" id="first-home-banner">
        <div class="col-lg-4">
            <i class="far fa-address-card"></i>
            <h2>Un espace membre personnel</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        </div>
        <hr class="w-100 d-md-none pb-3">
        <div class="col-lg-4">
            <i class="far fa-folder-open"></i>
            <h2>Archivage de vos notes de frais</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        </div>
        <hr class="w-100 d-md-none pb-3">
        <div class="col-lg-4">
            <i class="far fa-paper-plane"></i>
            <h2>Envoyé vos notes de frais facilement</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem magni fugiat eum expedita aperiam obcaecati, rerum facere, accusantium consequuntur, quas vel reiciendis?</p>
        </div>
    </div>

    <a class="btn btn-outline-primary btn-block" href="/inscription" role="button">M'inscrire &raquo;</a>

    <hr class="my-5">

    <div class="text-justify text-md-center">
        <div class="row">
            <div class="col">
                <h2>Une nouvelle façon de saisir vos notes de frais <span class="text-muted">pour vous simplifier le remboursement</span></h2>
                <p>Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
        </div>
        <hr class="my-5">
        <div class="row">
            <div class="col">
                <h2>Saisissez vos notes de frais, <span class="text-muted">éditer en cas d'erreur</span></h2>
                <p>Facere eligendi aliquid asperiores! Voluptatum itaque sint aut mollitia sequi, adipisci consequatur libero, nemo ipsum et blanditiis ex minima dolorem praesentium quos ut vero officia nisi explicabo quam beatae modi.</p>
            </div>
        </div>
        <hr class="my-5">
        <div class="row">
            <div class="col">
                <h2>Gérer les notes de frais, <span class="text-muted">en toute simplicité</span></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis perferendis commodi nostrum harum, ex consectetur quam nobis sed, aliquam doloremque provident modi eaque unde totam eligendi at quo id debitis?Facere eligendi aliquid asperiores! Voluptatum itaque sint aut mollitia sequi, adipisci consequatur libero, nemo ipsum et blanditiis ex minima dolorem praesentium quos ut vero officia nisi explicabo quam beatae modi.</p>
            </div>
        </div>
    </div>
    <hr class="my-5">
</div>