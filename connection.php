<?php
include "template/nav.php";
include "template/header.php";
include "model/connectionModel.php";
include "model/userModel.php";
include "model/entity/user.php";

session_unset();
// session_destroy();

var_dump($_POST);

if(!empty($_POST) && isset($_POST["login"])){
    
    $logMsg = "";
    $userModel = new UserModel();

    $user = $userModel->get_user_by_login($_POST["pseudo"]);
    echo "</br>--------------</br>";
    var_dump($user);

    if($user) {
        if(password_verify($_POST["password"], $user->getPassword())) {            
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