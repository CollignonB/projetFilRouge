<?php
include "template/nav.php";
include "template/header.php";
require_once "login.php";

$logMsg = "";

foreach(get_login() as $key => $value){
    if (isset($_POST["login"]) && !empty($_POST["login"]) && isset($_POST["password"]) && !empty($_POST["password"])){
        if ($value["login"] === $_POST["login"] && $value["password"] === $_POST["password"]){
            $logMsg = "Vous êtes connecté";
            break;
        }else{
            $logMsg = "Identifiant ou Mot de passe Incorrect";
        }
    }
}

?>
<main class="container">
<h2>Connexion</h2>
<div class="row">
    <form action="connection.php" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Nom de Compte</label>
        <input type="text" class="form-control" name="login">
        <small id="loginHelp" class="form-text text-muted">Ces informations sont confidentielles.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mot de Passe</label>
        <input type="text" class="form-control" name="password">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Connexion</button>

        <p><?php echo $logMsg ?></p>

    </form>
</div>

<?php 
include "template/footer.php";
?>