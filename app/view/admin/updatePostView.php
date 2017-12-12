<form action="/app/admin/miseAJour/".<?= $idBillet ?> method="post">
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title" value="<?= $title ?>">
    <textarea name="content_post" id="content" cols="30" rows="10">
        <?= $contenuBillet ?>
    </textarea>
    <input type="submit" value="Mettre à jour le Billet">
</form>

