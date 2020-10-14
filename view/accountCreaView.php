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