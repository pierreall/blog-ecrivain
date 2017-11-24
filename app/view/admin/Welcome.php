<?php
/*
// bienvenue.php
session_start();
if(isset($_SESSION['pseudo'])) {

}
else {
    header('Location: /app/admin/login');
}
*/?>

<a href="/app/billet/ajout"><button>Ajouter un Billet</button></a>
<a href="/app/billet/miseAJour"><button>Modifier un Billet</button></a>
<a href="/app/billet/effacement"><button>Supprimer un Billet</button></a>



<!--add_post.php-->
<!--<form action="/app/billet/ajout" method="post">
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title">
    <textarea name="content_post" id="" cols="30" rows="10">

    </textarea>
    <input type="submit" valider="Poster Billet">
</form>-->

<!--// modification billet
<form action="/app/billet/miseAJour/".<?/*= $id_post */?>.>
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title" value="<?/*= $title */?>">
    <textarea name="content_post" id="" cols="30" rows="10">
        <?/*= $content*/?>
    </textarea>
    <input type="submit" valider="Poster Billet">
</form>-->

<!--//suppression billet
<form action="/app/billet/effacement/".<?/*= $id_post */?>.>
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title" value="<?/*= $title */?>">
    <textarea name="content_post" id="" cols="30" rows="10">
        <?/*= $content*/?>
    </textarea>
    <input type="submit" valider="Poster Billet">
</form>-->
<!--todo a revoir suppression billet-->
//modération commentaire : suppression et/ou modification

//utilisateur: création compte auteur

