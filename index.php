<?php 
include "template/nav.php";
include "template/header.php";
require_once "acounts.php";
?>

<main class="container">
    <div class="row">

    <?php 
    foreach(get_accounts() as $key => $value):    
    ?>

      <div class="card mb-4 col-lg-3 mr-4 col-sm-12 col-md-5">
        <div class="card-header">
          <a href='account.php?name=<?php echo $value['name']?>&amount=<?php echo $value['amount']?>&owner=<?php echo $value['owner']?>&number=<?php echo $value['number']?>&lastOp=<?php echo $value['last_operation']?>'><?php echo $value['name']?></a> 
        </div>
        <div class="card-body">
          <h5 class="card-title">numeros de compte : <?php echo $value['number'] ?></h5>         
          <button class="btn btn-primary mb-2" type="button" data-toggle="collapse" data-target="#montantCible" aria-expanded="false" aria-controls="collapseExample">
            Montant du compte
          </button>
          <p class="card-text collapse" id="montantCible"><?php echo $value['amount'] ?>€</p>
            <a class="btn btn-primary" href="depot.html">Dépôt</a>
            <a class="btn btn-primary" href="retrait.html">Retrait</a>
          <button class="btn btn-danger mt-2" onclick="deleteAccount()">Supprimer le compte</button>
        </div>
      </div>
    <?php endforeach; ?>
    </div>

<script src="js/main.js"></script>
<?php 
include "template/footer.php";
?>