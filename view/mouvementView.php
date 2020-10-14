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