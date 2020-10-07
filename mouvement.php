<?php 
include "template/nav.php";
include "template/header.php";
?>
<main class="container">
  <h2>Mouvement sur le compte</h2>
  <div class="row">
    <div class="col-6">
      <form action="accountCrea.php" method="post">
        <div class="form-group">
          <label for="accountType">Type d'action</label>
          <select class="form-control" id="accountAction" name="accountAction">
            <option>Dépôt</option>
            <option>Retrait</option>
          </select>
        </div>
        <div class="form-group">
          <label for="amount">Montant à déplacer</label>
          <input type="number" class="form-control" id="amount" name ="amount"  min="50">
        </div>
        <button type="submit" class="btn btn-primary" name="accountCrea" >Créer</button>
      </form>
    </div>
  </div>

<?php 
include "template/footer.php";
?>