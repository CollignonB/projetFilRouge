<?php 

include "template/nav.php";
include "template/header.php";
include "model/connectionModel.php";
include "model/accountsModel.php";
include "model/entity/user.php";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}

$user = unserialize($_SESSION["user"]);
$accountModel = new AccountModel();
$datas = $accountModel->get_accounts($user);

include "view/accountView.php"; 
include "template/footer.php";
?> 