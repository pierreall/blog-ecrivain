<!--formulaire de connexion pour la zone admin-->
<form name="sentMessage" id="contactForm" action="http://blog-ecrivain/app/admin/verif" method="post">
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label for="pseudo">identifiant/pseudo</label>
            <input type="text" class="form-control" placeholder="pseudo" id="pseudo" name="pseudo" required>
            <p class="help-block text-danger"></p>
        </div>
    </div>
    <div class="control-group">
        <div class="form-group floating-label-form-group controls">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" placeholder="Mot de passe" id="password" name="password" required>
            <p class="help-block text-danger"></p>
        </div>
    </div>
    <br>
    <div id="success"></div>
    <div class="form-group">
        <input type="submit" class="btn btn-secondary" id="sendMessageButton" value="Se connecter">
    </div>
</form>
