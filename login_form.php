<div class="row loginform hide">     
        <div class="center login">
            <h2>Login</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="email" name="email" placeholder="email@email.com">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Mot de passe">
                </div>
                <input class="btn btn-info" type="submit" name="submit" value="Connexion">
            </form>
            <a id="create_account" href="#" style="padding-right : 15px;">Créer un compte</a><a href="#" style="padding-left : 15px;">Mot de passe oublié</a>
        </div>
    
        <div class="create hide">
            <h2>Création de compte</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="name_creation" placeholder="Pseudo">
                </div>
                <div class="form-group">
                    <input type="email" name="email_creation" placeholder="email@email.com">
                </div>
                <div class="form-group">
                    <input type="password" name="password_creation" placeholder="Mot de passe">
                    <input type="password" name="password_verification" placeholder=" Verification du mot de passe">
                </div>
                <input class="btn btn-info" type="submit" name="submit" value="Creer compte">
            </form>
        </div>
</div>
<?php 
include('./login_process.php');
include('./account_process.php');
?>
