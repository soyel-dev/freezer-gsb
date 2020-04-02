<?php
session_start();

if(isset($_SESSION['login'])) {
    header('Location: /profil');
    exit();
}

$title='Connexion';

use App\Connection;
use App\Model\Member;

$pdo = Connection::getPDO();

if(!empty($_POST)){
    $login = htmlspecialchars($_POST['login']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $errors = array();
    if(!empty($_POST['login']) && !empty($_POST['mdp'])){
        $query = $pdo->prepare("SELECT * FROM visiteur WHERE login = ? AND mdp = ?");
        $query->execute([$login, $mdp]);
        $query->setFetchMode(PDO::FETCH_CLASS, Member::class);
        $usermatch = $query->fetch();
        if($usermatch) {
            $_SESSION['id'] = $usermatch->getID();
            $_SESSION['prenom'] = $usermatch->getPrenom();
            $_SESSION['nom'] = $usermatch->getNom();
            $_SESSION['login'] = $login;
            header('Location: /profil');
            exit;
        } else {
            $errors['failed'] = "Mauvais identifiant ou mot de passe";
        }
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
    
    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <p>Le formulaire de connexion comporte une erreur :</p>
            <?php foreach($errors as $error): ?>
                <li class="list-unstyled"><?php echo $error; ?></li>
            <?php endforeach; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <h4>Se connecter</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="login">Identifiant</label>
                    <input type="text" class="form-control" id="login" name="login" required>
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" required>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-block">Connexion</button>
            </form>
        </div>
    </div>
</div>