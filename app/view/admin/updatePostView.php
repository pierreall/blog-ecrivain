// modification billet
<form action="/app/billet/miseAJour/".<?= $id_post ?>.>
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title" value="<?= $title ?>">
    <textarea name="content_post" id="" cols="30" rows="10">
        <?= $content?>
    </textarea>
    <input type="submit" valider="Poster Billet">
</form>