//suppression billet
<?php
echo '<form action="/app/admin/validationEffacement/'.$id_post.'" method="post">
   <label for="">Voulez vous vraiment supprimer ce billet ?</label>


<label for="">Oui:</label>
            <input type="radio" name="suppr" value="oui">
       
            <label for="">Non:</label>
           <input type="radio" name="suppr" value="non"> 
           
  
   <input type="submit" value="Confirmer" class="btn btn-default">
</form>';
?>

