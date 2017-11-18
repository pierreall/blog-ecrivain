<form action="/app/admin/verif" method ="post">
    <label for="pseudo">Identifiant/pseudo :</label>
    <input type ="text" name ="pseudo" id="pseudo" required>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required>
    <input type = "submit" value="se connecter">
</form>


<?php $contenu = ob_get_flush();
$title = "Connection administration" ;
require 'app/view/post.html';
?>




