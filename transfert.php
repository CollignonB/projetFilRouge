<?php

include "template/nav.php";
include "template/header.php";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}

include "view/transfertView.php";
include "template/footer.php";
?>