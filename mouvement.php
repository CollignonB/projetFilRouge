<?php 
include "template/nav.php";
include "template/header.php";
include "model/connectionModel.php";
include "model/transfertModel.php";
include "model/entity/transfert.php";
include "model/accountsModel.php";
include "model/entity/account.php";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}

$transfertModel = new TransfertModel();

if(!empty($_POST) && isset($_POST["financialMvt"])){
  $transfert = new Transfert($_POST);
  
  $transfertModel->add_new_transfert($transfert, $_GET["id"]);

  $accountModel = new AccountModel();
  $account = new Account($accountModel->get_account($_GET["id"]));
  $new_amount = floatval($account->getMontant());

  if($_POST["type"] === "débit" ){
    $new_amount -= floatval($_POST["amount"]);
  }elseif($_POST["type"] === "crédit" ){
    $new_amount += floatval($_POST["amount"]);
  }
  $accountModel->update_amount($account, $new_amount);
  header("location:index.php");
}

include "view/mouvementView.php";
include "template/footer.php";
?>