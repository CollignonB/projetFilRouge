<?php 

include "template/nav.php";
include "template/header.php";
include "model/connectionModel.php";
include "model/accountsModel.php";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}


$datas = get_accounts($db, $_SESSION["user"]["id"]);

include "view/accountView.php"; 
include "template/footer.php";
?> 