<?php 
include "template/nav.php";
include "template/header.php";
include "model/connectionModel.php";
include "model/accountsModel.php";



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

switch((htmlspecialchars($_POST["accountType"]))){
  case "PEL":
    $accountType = 1;
    break;
    case "Livret A":
      $accountType = 2;
    break;
    case "PER":
      $accountType = 3;
    break;
    case "Compte Courant":
      $accountType = 4;
      break;
}
if(!empty($_POST) && isset($_POST["accountCrea"])){
  add_new_account($db, $_SESSION["user"]["id"], htmlspecialchars($accountType), $_POST["amount"]);
}
include "view/accountCreaView.php";
include "template/footer.php";
?>