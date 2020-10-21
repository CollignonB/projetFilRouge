<?php 
include "template/nav.php";
include "template/header.php";
include "model/accountsModel.php";
include "model/entity/account.php";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}

$accountModel = new AccountModel();

$account = new Account($accountModel->get_account($_GET["id"]));
var_dump($account);


$data = $accountModel->get_last_operations($_GET["id"]);

include "view/singleView.php";
include "template/footer.php";
?>