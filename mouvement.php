<?php 
include "template/nav.php";
include "template/header.php";
include "model/connectionModel.php";
include "model/movementModel.php";
include "model/accountsModel.php";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}

$account = get_account($db, $_GET["id"]);

if(!empty($_POST) && isset($_POST["financialMvt"])){

  add_new_transfert($db, $_POST["accountAction"], $_POST["amount"], $account["id"]);
  $new_amount = floatval($account["montant"]);

  if($_POST["accountAction"] === "débit" ){
    $new_amount -= floatval($_POST["amount"]);
  }elseif($_POST["accountAction"] === "crédit" ){
    $new_amount += floatval($_POST["amount"]);
  }

  update_amount($db, $new_amount, $account["id"]);
}

?>
<main class="container">
  <h2>Mouvement sur le compte</h2>
  <div class="row">
    <div class="col-6">
      <form action="" method="post">
        <div class="form-group">
          <label for="accountType">Type d'action</label>
          <select class="form-control" id="accountAction" name="accountAction">
            <option value="crédit">crédit</option>
            <option value="débit">débit</option>
          </select>
        </div>
        <div class="form-group">
          <label for="amount">Montant à déplacer</label>
          <input type="number" class="form-control" id="amount" name ="amount">
        </div>
        <input type="submit" class="btn btn-primary" name="financialMvt" value="Valider"></input>
      </form>
    </div>
  </div>
<?php 
include "template/footer.php";
?>