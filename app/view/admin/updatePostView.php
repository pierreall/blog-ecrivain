<!--view for updating the posts-->
<div class="btn-group">
    <a href="/app/admin/home" class="btn btn-outline-info" role="button" aria-pressed="true">Accueil administration</a>
</div>
<hr>
<form action="/app/admin/validationMiseAJour/<?= $idPost?>" method="post">
    <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" value="<?= $title ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="content">Contenu :</label>
         <textarea name="content_post" id="content" cols="30" rows="10">
        <?= $contentPost ?>
    </textarea>
    </div>

    <input type="submit" value="Mettre à jour le Billet" class="btn btn-outline-success">
</form>

