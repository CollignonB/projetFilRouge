<?php
include "template/nav.php";
include "template/header.php";
require_once "login.php";
include "model/connectionModel.php";
include "model/userModel.php";

session_unset();
// session_destroy();

$logMsg = "";

if(!empty($_POST) && isset($_POST["login"])){

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


include "view/connectionView.php";
include "template/footer.php";
?>