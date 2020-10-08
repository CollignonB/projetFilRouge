<?php

include "template/nav.php";
include "template/header.php";
session_start();
if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}
?>
<main class="container">    
    <table class="table">
      <thead>
        <th class="bg-primary text-white"> Pays</th>
        <th class="bg-primary text-white"> Indice Boursier</th>
        <th class="bg-primary text-white"> Valeur</th>
        <th class="bg-primary text-white"> Augmentaion</th>
      </thead>
    </table>

    <script src="js/stats.js"></script>
<?php 
include "template/footer.php";
?>