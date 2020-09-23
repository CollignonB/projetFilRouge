<?php 
include "template/nav.php";
include "template/header.php";
?>

<main class="container">
  <div>
    <h2><?php echo $_GET["name"] ?></h2>
    <div>
    <p>Montant sur le compte : <?php echo $_GET["amount"] ?></p>
    <p>Détail : <?php echo $_GET["details"] ?></p>
    </div>
  </div>    

<?php 
include "template/footer.php";
?>