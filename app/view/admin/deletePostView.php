//suppression billet

<?php echo '<form action="/app/admin/validationEffacement/'.$id_post.'" method="post">
    <label for="">Voulez vous vraiment supprimer ce billet ?</label>
    <input type="radio" name="suppr" value="oui">
    <input type="radio" name="suppr" value="non">
    <input type="submit" valider="Poster Billet">
</form>';