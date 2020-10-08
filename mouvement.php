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
    "SELECT * FROM accounts
    WHERE id = :accountid"
);
$query->execute([
    "accountid" => $_GET["id"]
]);
$account = $query->fetch(PDO::FETCH_ASSOC);

if(!empty($_POST) && isset($_POST["financialMvt"])){
    $query = $db->prepare(
        "INSERT INTO transferts (type, amount, account_id, date_transfert)
        VALUES (:typeT, :amount, :account_id, current_timestamp())"
    );
    $query->execute([
        "typeT"=>$_POST["accountAction"],
        "amount"=>$_POST["amount"],
        "account_id"=>$account["id"]
    ]);
    $newAmount = $account["montant"];

    if(isset($_POST["accountAction"]) === "dépôt" ){
        $newAmount += $_POST["amount"];
    }else{
        $newAmount -= $_POST["amount"];
    }

    $request = $db->prepare(
        "UPDATE accounts SET montant = :newAmount WHERE accounts.id = :accountId"
    );
    $request->execute([
        "newAmount"=>$newAmount,
        "accountId"=>$account["id"]
    ]);
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
            <option>dépôt</option>
            <option>retrait</option>
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