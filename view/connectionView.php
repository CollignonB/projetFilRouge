<main class="container">
<h2>Connexion</h2>
<div class="row">
    <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Nom de Compte</label>
            <input type="text" class="form-control" name="pseudo">
            <small id="loginHelp" class="form-text text-muted">Ces informations sont confidentielles.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mot de Passe</label>
            <input type="password" class="form-control" name="password">
        </div>
        <input type="submit" class="btn btn-primary" name="login" value="Connexion"></input>
        <p><?php echo $logMsg ?></p>
    </form>
</div>
<script src="js/main.js"></script>