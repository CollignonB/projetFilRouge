<?php 
include "template/nav.php";
include "template/header.php";
include "model/connectionModel.php";
include "model/accountsModel.php";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}

$data = get_last_operations($db, $_GET["id"]);

include "view/singleView.php";
include "template/footer.php";
?>