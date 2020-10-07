<?php
include "template/nav.php";
include "template/header.php";
require_once "login.php";
if(!empty($_POST) && isset($_POST["login"])){
    try{
        $db = new PDO('mysql:host=localhost;dbname=banque_php','root');
    }catch(PDOException $e){
        print"Erreur !: " . $e->getMessage() . "</br>";
        die();
    }
    
    $query = $db->prepare(
        "SELECT * FROM users
        WHERE login = :pseudo"
    );
    $query->execute([
        "pseudo"=>$_POST["pseudo"]
    ]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    
    if($user) {
        if(password_verify($_POST["password"], $user["password"])) {            
            session_start();
            $_SESSION["user"] = $user;
            header("location:index.php");
            var_dump($user);  

        }else{
            $logMsg = "identifiant ou mot de passe incorect";
        }
    }
}


$logMsg = "";

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
    <!-- <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->
    <input type="submit" class="btn btn-primary" name="login" value="Connexion"></input>

        <p><?php echo $logMsg ?></p>

    </form>
</div>
<!-- <script src="js/main.js"></script> -->
<?php 

include "template/footer.php";
?>