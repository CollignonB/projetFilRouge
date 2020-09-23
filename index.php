<?php 
include "template/nav.php";
include "template/header.php";
?>

<main class="container">
    <div class="row">
      
      <div class="card mb-4 col-lg-3 mr-4 col-sm-12 col-md-5">
        <div class="card-header">
          <a href='account.php?name=<?php echo "CompteCourant"?>&amount=<?php echo "6500€"?>&details=<?php echo "Je suis trop maigre"?>'>Compte Courant</a> 
        </div>
        <div class="card-body">
          <h5 class="card-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5>         
          <button class="btn btn-primary mb-2" type="button" data-toggle="collapse" data-target="#montantCible0" aria-expanded="false" aria-controls="collapseExample">
            Montant du compte
          </button>
          <p class="card-text collapse" id="montantCible0">+ XXXXX,XX€</p>
            <a class="btn btn-primary" href="depot.html">Dépôt</a>
            <a class="btn btn-primary" href="retrait.html">Retrait</a>
          <button class="btn btn-danger mt-2" onclick="deleteAccount()">Supprimer le compte</button>
        </div>
    </div>


    <script src="js/main.js"></script>

<?php 
include "template/footer.php";
?>