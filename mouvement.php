<?php 
include "template/nav.php";
include "template/header.php";
include "model/connectionModel.php";
include "model/movementModel.php";
include "model/accountsModel.php";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}

$account = get_account($db, $_GET["id"]);

if(!empty($_POST) && isset($_POST["financialMvt"])){

  add_new_transfert($db, $_POST["accountAction"], $_POST["amount"], $account["id"]);
  $new_amount = floatval($account["montant"]);

  if($_POST["accountAction"] === "débit" ){
    $new_amount -= floatval($_POST["amount"]);
  }elseif($_POST["accountAction"] === "crédit" ){
    $new_amount += floatval($_POST["amount"]);
  }

  update_amount($db, $new_amount, $account["id"]);
}

include "view/mouvementView.php";
include "template/footer.php";
?>