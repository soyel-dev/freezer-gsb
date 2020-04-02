<?php
session_start();

if(isset($_SESSION['login'])) {
    header('Location: /profil');
    exit();
}

$title = 'Inscription';

use App\Connection;

$pdo = Connection::getPDO();

if(!empty($_POST)) {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $role = htmlspecialchars($_POST['role']);
    $address = htmlspecialchars($_POST['address']);
    $zip = htmlspecialchars($_POST['zip']);
    $city = htmlspecialchars($_POST['city']);
    $login = htmlspecialchars($_POST['login']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
    $created_at = date("Y-m-d H:i:s");
    if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['role']) && !empty($_POST['address']) && !empty($_POST['zip']) && !empty($_POST['city']) && !empty($_POST['login']) && !empty($_POST['password'])) {
        if($_POST['password'] != $_POST['passwordConfirm']) {
            $errors['password'] = "Les mots de passe ne correspondent pas";
        } else {
            $query = $pdo->prepare("INSERT INTO user SET firstName = ?, lastName = ?, role = ?, address = ?, zip = ?, city = ?, login = ?, password = ?, created_at = ?");
            $query->execute([$firstName, $lastName, $role, $address, $zip, $city, $login, $password, $created_at]);
            $success = true;
        }
    } else {
        $errors['empty'] = "Tous les champs doivent être complétés";
    }
}

?>

<div class="jumbotron">
    <div class="container">
        <h2><?= $title ?></h2>
    </div>
</div>

<div class="container">
<?php if(isset($success) && $success === true): ?>
    <div class="alert alert-success text-center">
        Votre compte a bien été enregistré. Vous pouvez vous <a href="/connexion">connecter</a> ?
    </div>
    <?php endif ?>
    <?php if(!empty($errors)): ?>
    <div class="alert alert-danger text-center alert-dismissible" role="alert">
        <?php foreach($errors as $error): ?>
        <li class="list-unstyled"><?php echo $error; ?></li>
        <?php endforeach; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif ?>
    <div class="card">
        <div class="card-header">
            <h4>S'inscrire</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <div class="form-row form-group">
                    <div class="col-lg-6">
                        <label for="firstName">Prénom</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                    </div>
                    <div class="col-lg-6">
                        <label for="lastName">Nom</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role">Rôle</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="">Choisissez un rôle...</option>
                        <option value="Visiteur">Visiteur</option>
                        <option value="Comptable">Comptable</option>
                    </select>
                </div>
                <div class="form-row form-group">
                    <div class="col-lg-4">
                        <label for="zip">Code postal</label>
                        <input type="number" class="form-control" id="zip" name="zip" required>
                    </div>
                    <div class="col-lg-8">
                        <label for="city">Ville</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Adresse</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="username">Identifiant</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                    <small class="text-muted">Cet identifiant vous permet de vous identifier sur Freezer</small>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="passwordConfirm">Confirmation mot de passe</label>
                    <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" required>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-block">Valider</button>
            </form>
        </div>
    </div>
</div>