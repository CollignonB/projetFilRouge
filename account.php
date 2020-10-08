<?php 
include "template/nav.php";
include "template/header.php";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}

try{
  $db = new PDO('mysql:host=localhost;dbname=banque_php','root');
}catch(PDOException $e){
  print"Erreur !: " . $e->getMessage() . "</br>";
  die();
}

$query = $db->prepare(
  "SELECT t.type, t.amount, t.date_transfert FROM `transferts` as t 
  INNER JOIN accounts as a ON a.id = t.account_id 
  INNER JOIN account_types as a_t ON a_t.id = a.account_type_id 
  WHERE a.id = :userId 
  ORDER BY date_transfert DESC;"
);

$query->execute([
  "userId" => $_GET["id"]
]);

$data = $query->fetchAll(PDO::FETCH_ASSOC);

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