<?php 
include "template/nav.php";
include "template/header.php";

try{
  $db = new PDO('mysql:host=localhost;dbname=banque_php','root');
}catch(PDOException $e){
  print"Erreur !: " . $e->getMessage() . "</br>";
  die();
}

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}
$error = "";

$accountData = ["Nom du compte","Type du compte", "montant du premier dépot"];
if(isset($_POST["accountName"]) && !empty($_POST["accountName"])){
  $accountData[0] = htmlspecialchars($_POST["accountName"]);
}

if(isset($_POST["accountType"]) && !empty($_POST["accountType"])){
  $accountData[1] =  htmlspecialchars($_POST["accountType"]);
}

if(isset($_POST["amount"]) && !empty($_POST["amount"]) && $_POST["amount"] >= 50){
  $accountData[2] = htmlspecialchars($_POST["amount"]);
}
else {
  $error .= "Montant minum 50 euros !";
}

switch(isset(htmlspecialchars($_POST["accountType"]))){
  case "PEL":
    $accountType = 1;
    break;
    case "Livret A":
      $accountType = 2;
    break;
    case "PER":
      $accountType = 3;
    break;
    case "Compte Courant":
      $accountType = 4;
      break;
}
if(!empty($_POST) && isset($_POST["accountCrea"])){
  $query = $db->prepare(
    "INSERT INTO accounts (date_crea, user_id, account_type_id, montant)
    VALUES (current_timestamp(), :userId, :account_type_id, :montant)"
  );

  $query->execute([
    "userId" => $_SESSION["user"]["id"],
    "account_type_id" => htmlspecialchars($accountType),
    "montant" => htmlspecialchars($_POST["amount"])
  ]);
}

?>

<main class="container">
  <h2>Création d'un nouveau compte</h2>
  <div class="row">
    <div class="col-6">
    <?php if(!empty($error)) { echo "<p class='alert alert-danger'>$error</p>";}?>
      <form action="accountCrea.php" method="post">
        <div class="form-group">
          <label for="accountType">Type de Compte</label>
          <select class="form-control" id="accountType" name="accountType">
            <option>Compte Courant</option>
            <option>PEL</option>
            <option>Livret A</option>
            <option>PER</option>
          </select>
        </div>
        <div class="form-group">
          <label for="amount">Premier Dépôt</label>
          <input type="number" class="form-control" id="amount" name ="amount"  min="50">
        </div>
        <button type="submit" class="btn btn-primary" name="accountCrea" >Créer</button>
      </form>
    </div>
    <div class="col-6" >
      <?php if(empty($error)) : ?>
        <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $accountData[0] ?></h5>
          <h6 class="card-subtitle mb-2 text-muted">Type de compte : <?php echo $accountData[1] ?></h6>
          <p class="card-text">Montant : <?php echo $accountData[2] ?> €</p>
        </div>
      </div>
    </div>
      <?php endif; ?>
  </div>
<?php
include "template/footer.php";
?>