<?php 
include "template/nav.php";
include "template/header.php";
include "model/connectionModel.php";
include "model/accountsModel.php";
include "model/entity/account.php";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}

$accountModel = new AccountModel();
$table = $accountModel->get_account($_GET["id"]);

$account_type = "";
switch ($table["account_type_id"]) {
  case 1:
      $account_type = "PEL";
      break;
  case 2: 
      $account_type = "Livret A";
      break;
  case 3:
      $account_type = "PER";
      break;
  case 4:
      $account_type = "Compte Courant";
      break;
}

$data = $accountModel->get_last_operations($db, $_GET["id"]);

include "view/singleView.php";
include "template/footer.php";
?>