<?php 
include "template/nav.php";
include "template/header.php";
include "model/connectionModel.php";
include "model/accountsModel.php";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}

$data = get_last_operations($db, $_GET["id"]);
?>

<main class="container">
  <div>
    <h2>Compte numéros : <?php echo $_GET["id"] ?></h2>
    <div>Type de compte : <?php echo $_GET["type"] ?></div>
    <div>Montant sur ce compte : <?php echo $_GET["amount"]?>€</div>
    <div>
      <p>Dernières opérations sur ce compte : </br></p>
      <?php foreach($data as $key => $value):?>
        <p>-----------------------------</p>
      <p>Date de l'opération : <?php echo $value["date_transfert"]; ?></p>
      <p>Type d'opération : <?php echo $value["type"] ?> </p>
      <p>Montant de l'opération : <?php echo $value["amount"] ?> </p>
      <?php endforeach ?>
    </div>
  </div>    

<?php 
include "template/footer.php";
?>