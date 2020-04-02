<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <title><?= $title ?? '' ?> &middot; Freezer</title>
    </head>

    <style>
        <?php
        require 'CSS/style.css';
        ?>
    </style>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="/">Freezer</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link <?php if($current_page == 'home') { echo 'active'; } ?>" href="/">Accueil</a>
                            </li>
                            <?php if(isset($_SESSION['login'])): ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if($current_page == 'profil') { echo 'active'; } ?>" href="/profil">Profil</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle <?php if($current_page == 'entry-fees') { echo 'active'; } ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Fiche
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/frais/nouvelle-fiche"><i class="fas fa-plus pr-2"></i>Crée fiche</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/frais/fiche"><i class="far fa-eye pr-2"></i>Affichage des fiches</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-light" href="/deconnexion" title="Déconnexion">Déconnexion</a>
                            <?php else: ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Espace membre
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/connexion" title="Se connecter"><i class="fas fa-user pr-2"></i>Se connecter</a>
                                    <a class="dropdown-item" href="/inscription" title="S'inscrire"><i class="fas fa-user-plus pr-2"></i>S'inscrire</a>
                                </div>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
                
        <main role="main">
            <?= $content ?>
        </main>

        <footer>
            <div class="container text-center text-md-left mt-5">
                <div class="row">
                    <div class="col-md-9 mt-md-0 mt-3">
                        <h5>Freezer</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur exercitationem explicabo minima magni aperiam, doloribus similique ullam hic molestiae aliquid recusandae modi omnis impedit iste veritatis fuga inventore pariatur illo.Error vitae odit ad, expedita laboriosam sed omnis, quod quisquam deserunt asperiores est in blanditiis doloribus voluptatibus, corporis esse !</p>
                    </div>
                    <hr class="clearfix w-100 d-md-none pb-3">
                    <div class="col-md-3 mb-md-0 mb-3">
                        <h5>Liens utiles</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="/">Accueil</a>
                            </li>
                            <li>
                                <a href="/connexion">Se connecter</a>
                            </li>
                            <li>
                                <a href="/inscription">S'inscrire</a>
                            </li>
                            <li>
                                <a href="/#">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center py-3"><a href="/">Freezer</a> &middot; 2020 Tous droits réservés
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    </body>

</html>