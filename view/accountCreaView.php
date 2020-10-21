<main class="container">
  <h2>Création d'un nouveau compte</h2>
  <div class="row">
    <div class="col-6">
    <?php if(!empty($error)) { echo "<p class='alert alert-danger'>$error</p>";}?>
      <form action="accountCrea.php" method="post">
        <div class="form-group">
          <label for="account_type_id">Type de Compte</label>
          <select class="form-control" id="account_type_id" name="account_type_id">
            <option value="4">Compte Courant</option>
            <option value="1">PEL</option>
            <option value="2">Livret A</option>
            <option value="3">PER</option>
          </select>
        </div>
        <div class="form-group">
          <label for="montant">Premier Dépôt</label>
          <input type="number" step="0.01" class="form-control" id="montant" name ="montant" min="50">
        </div>
        <button type="submit" class="btn btn-primary" name="accountCrea" value="Enregistrer">Créer</button>
      </form>
    </div>
    <div class="col-6" >
      <?php if(empty($error)) :?>
        <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted">Type de compte : <?php echo $account->changeAccount_type(); ?></h6>
          <p class="card-text">Montant : <?php echo $account->getMontant(); ?> €</p>
        </div>
      </div>
    </div>
      <?php endif; ?>
  </div>