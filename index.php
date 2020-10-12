<?php 

include "template/nav.php";
include "template/header.php";
// require_once "acounts.php";
include "model/connectionModel.php";
include "model/accountsModel.php";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}


$account = get_accounts($db, $_SESSION["user"]["id"]);

// gérer le problème de cette requête, elle renvoit le même montant sur tout les comptes 
// $query = $db->prepare(
//   "SELECT t.type, t.amount, t.date_transfert FROM `transferts` as t 
//   INNER JOIN accounts as a ON a.id = t.account_id 
//   INNER JOIN account_types as a_t ON a_t.id = a.account_type_id 
//   WHERE a.id = :userId 
//   ORDER BY date_transfert DESC
//   LIMIT 1;"
// );

// $query->execute([
//   "userId" => $_SESSION["user"]["id"]
// ]);~
// $data = $query->fetch(PDO::FETCH_ASSOC);
// $lastOp = $data["type"] . "/" . $data["amount"] . "€</br>" . $data["date_transfert"];

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


?>

<main class="container">

    <div class="row">

    <?php 
    foreach($account as $key => $value):  
    ?>

      <div class="card mb-4 col-lg-3 mr-4 col-sm-12 col-md-5">
        <div class="card-header">
         <a href="account.php?id=<?php echo $value["id"] ?>&type=<?php echo $value["name"]?>&amount=<?php echo $value["montant"]?>"><?php echo $value["name"]; ?></a>
        </div>
        <div class="card-body">
          <h5 class="card-title">numeros de compte : <?php echo $value['id']; ?></h5>         
          <button class="btn btn-primary mb-2" type="button" data-toggle="collapse" data-target="#montantCible<?php echo $value["id"]?>" aria-expanded="false" aria-controls="collapseExample">
            Montant du compte
          </button>
          <p class="card-text collapse" id="montantCible<?php echo $value["id"]?>"><?php echo $value['montant']; ?>€</p>

          <!-- <button class="btn btn-primary mb-2" type="button" data-toggle="collapse" data-target="#operationCible<?php echo $value["id"]?>" aria-expanded="false" aria-controls="collapseExample">
            Dernière opération 
          </button>
          <p class="card-text collapse" id="operationCible<?php echo $value["id"]?>"><?php echo $lastOp ?></p> -->
          <a class="btn btn-primary" href="mouvement.php?id=<?php echo $value['id']; ?>">Dépôt/Retrait</a>
          <button class="btn btn-danger mt-2" onclick="deleteAccount()">Supprimer le compte</button>
        </div>
      </div>
    <?php endforeach; ?>
    </div>

<?php 
include "template/footer.php";
?> 