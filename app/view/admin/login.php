<form action="../../admin/controler/verification.php" method ="post">
    <input type ="text" name ="pseudo">
    <input type="password" name="password">
    <input type = "submit" value="se connecter">
</form>

<?php $contenu = ob_get_flush();
//require 'app/view/index.html';
?>




