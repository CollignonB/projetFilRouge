<?php 
include "template/nav.php";
include "template/header.php";
?>

<main class="container">
  <div>
    <h2><?php echo $_GET["name"] ?></h2>
    <div>
    <p>Montant sur le compte : <?php echo $_GET["amount"] ?>€</p>
    <p>Numéros de compte : <?php echo $_GET["number"] ?></p>
    <p>Propriétaire du compte : <?php echo $_GET["owner"] ?></p>
    <p>Dernière opération sur le compte : <?php echo $_GET["lastOp"] ?> </p>
    </div>
  </div>    

<?php 
include "template/footer.php";
?>