<?php 

include "template/nav.php";
include "template/header.php";
include "model/connectionModel.php";
include "model/accountsModel.php";

if(empty($_SESSION["user"]) || !isset($_SESSION["user"])){
  header("location:connection.php");
}


$datas = get_accounts($db, $_SESSION["user"]["id"]);

?>

<main class="container">

    <div class="row">

    <?php 
    foreach($datas as $key => $value): 

    ?>

      <div class="card mb-4 col-lg-3 mr-4 col-sm-12 col-md-5">
        <div class="card-header">
         <a href="account.php?id=<?php echo $value["account_ID"] ?>&type=<?php echo $value["name"]?>&amount=<?php echo $value["montant"]?>"><?php echo $value["name"]; ?></a>
        </div>
        <div class="card-body">
          <h5 class="card-title">numeros de compte : <?php echo $value['account_ID']; ?></h5>         
          <button class="btn btn-primary mb-2" type="button" data-toggle="collapse" data-target="#montantCible<?php echo $value["account_ID"]?>" aria-expanded="false" aria-controls="collapseExample">
            Montant du compte
          </button>
          <p class="card-text collapse" id="montantCible<?php echo $value["account_ID"]?>"><?php echo $value['montant']; ?>€</p>

          <button class="btn btn-primary mb-2" type="button" data-toggle="collapse" data-target="#operationCible<?php echo $value["account_ID"]?>" aria-expanded="false" aria-controls="collapseExample">
            Dernière opération 
          </button>
          <p class="card-text collapse" id="operationCible<?php echo $value["account_ID"]?>"><?php echo $value["type"] . "/" . $value["transfert_amount"] . "€</br>" . $value["date_transfert"] ?></p>
          <a class="btn btn-primary" href="mouvement.php?id=<?php echo $value['account_ID']; ?>">Dépôt/Retrait</a>
          <button class="btn btn-danger mt-2" onclick="deleteAccount()">Supprimer le compte</button>
        </div>
      </div>
    <?php endforeach; ?>
    </div>

<?php 
include "template/footer.php";
?> 