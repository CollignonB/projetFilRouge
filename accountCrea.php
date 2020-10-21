<?php 
include "template/nav.php";
include "template/header.php";
include "model/connectionModel.php";
include "model/accountsModel.php";
include "model/entity/account.php";
include "model/entity/user.php";

$accountModel = new AccountModel();

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}
$error = "";

$accountData = ["Nom du compte","Type du compte", "montant du premier dépot"];

if(isset($_POST["account_type_id"]) && !empty($_POST["account_type_id"])){
  $accountData[1] =  htmlspecialchars($_POST["account_type_id"]);
}

if(isset($_POST["montant"]) && !empty($_POST["montant"]) && $_POST["montant"] >= 50){
  $accountData[2] = htmlspecialchars($_POST["montant"]);
}
else {
  $error .= "Montant minum 50 euros !";
}

if(!empty($_POST) && isset($_POST["accountCrea"])){
  $account = new Account($_POST);
  $account->setUser(unserialize($_SESSION["user"]));
  $accountModel->add_new_account($account);
}
include "view/accountCreaView.php";
include "template/footer.php";
?>