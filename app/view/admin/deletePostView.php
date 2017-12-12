//suppression billet
<?php echo '<form action="/app/admin/effacement/'.$id_post.'">
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title" value="<?= $title ?>">
    <textarea name="content_post" id="" cols="30" rows="10">

    </textarea>
    <input type="submit" valider="Poster Billet">
</form>';