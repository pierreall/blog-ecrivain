<!--view for adding a post-->
<form action="/app/admin/ajout" method="post">
    <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="content">Contenu :</label>
        <textarea name="content_post" id="content" cols="30" rows="10" class="form-control" required>

    </textarea>
    </div>

    <input type="submit" value="Poster Billet" class="btn btn-outline-success">
</form>