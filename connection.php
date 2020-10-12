<?php
include "template/nav.php";
include "template/header.php";
require_once "login.php";
include "model/connectionModel.php";
include "model/userModel.php";

session_unset();

$logMsg = "";

if(!empty($_POST) && isset($_POST["login"])){
    // try{
    //     $db = new PDO('mysql:host=localhost;dbname=banque_php','root');
    // }catch(PDOException $e){
    //     print"Erreur !: " . $e->getMessage() . "</br>";
    //     die();
    // }
    
    // $query = $db->prepare(
    //     "SELECT * FROM users
    //     WHERE login = :pseudo"
    // );
    // $query->execute([
    //     "pseudo"=>htmlspecialchars($_POST["pseudo"])
    // ]);
    // $user = $query->fetch(PDO::FETCH_ASSOC);
    $user = get_user_pseudo($db, htmlspecialchars($_POST["pseudo"]));
    if($user) {
        if(password_verify($_POST["password"], $user["password"])) {            
            $_SESSION["user"] = $user;
            header("location:index.php");
        }else{
            $logMsg = "identifiant ou mot de passe incorect";
        }
    }
}

?>
<main class="container">
<h2>Connexion</h2>
<div class="row">
    <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Nom de Compte</label>
            <input type="text" class="form-control" name="pseudo">
            <small id="loginHelp" class="form-text text-muted">Ces informations sont confidentielles.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mot de Passe</label>
            <input type="password" class="form-control" name="password">
        </div>
        <input type="submit" class="btn btn-primary" name="login" value="Connexion"></input>
        <p><?php echo $logMsg ?></p>
    </form>
</div>
<script src="js/main.js"></script>
<?php 

include "template/footer.php";
?>