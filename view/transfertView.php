
<main class="container">
    <form>
      <div class="form-group">
        <label for="accountType">Type de compte</label>
        <select class="form-control" id="accountToDebit">
          <option>compte1</option>
          <option>compte2</option>
          <option>compte3</option>
        </select>
      </div>
      <div class="form-group">
        <label for="amounToTransfert">Montant à transferer</label>
        <input type="number" class="form-control" id="amounToTransfert">
        <p id="errorT"></p>
      </div>
    
    <div class="form-group">
      <label for="accountType">Type de compte</label>
      <select class="form-control" id="accountToCredit">
        <option>compte1</option>
        <option>compte2</option>
        <option>compte3</option>
      </select>
      <p id="errorM"></p>
      <input type="submit" value="Valider" class="btn btn-primary mt-4">
    </form>

    <script src="js/transfert.js"></script>