<?php 
include "template/nav.php";
include "template/header.php";
include "model/connectionModel.php";
include "model/accountsModel.php";
include "model/entity/account.php";
include "model/entity/user.php";

$accountModel = new AccountModel();

// echo "POST : ";
// var_dump($_POST);
// echo "</br> ------------------- </br>";
// echo "SESSION : ";
// var_dump(($_SESSION["user"]));
// echo "</br>---------------</br>";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}
$error = "";

$accountData = ["Nom du compte","Type du compte", "montant du premier dépot"];
if(isset($_POST["accountName"]) && !empty($_POST["accountName"])){
  $accountData[0] = htmlspecialchars($_POST["accountName"]);
}

if(isset($_POST["accountType"]) && !empty($_POST["accountType"])){
  $accountData[1] =  htmlspecialchars($_POST["accountType"]);
}

if(isset($_POST["amount"]) && !empty($_POST["amount"]) && $_POST["amount"] >= 50){
  $accountData[2] = htmlspecialchars($_POST["amount"]);
}
else {
  $error .= "Montant minum 50 euros !";
}

if(!empty($_POST) && isset($_POST["accountCrea"])){
  $account = new Account($_POST);
  $account->setUser(unserialize($_SESSION["user"]));
  // var_dump($account);
  $accountModel->add_new_account($account);
}
include "view/accountCreaView.php";
include "template/footer.php";
?>