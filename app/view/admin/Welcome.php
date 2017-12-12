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

<a href="/app/admin/ajout"><button class="btn btn-default">Ajouter un Billet</button></a>

<?php /*foreach ($array['donneeBillet'] as $billet) {*/?><!--
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                    <?php /*echo "<a href='/app/billet/affichage/'>" */?>;
                    <h2 class="post-title">
                        <?/*= $billet->getTitre() */?>
                    </h2>
                    </a>
                    <p class="post-meta">Posté par
                        <a href="#"><?/*= $billet->getAuteur() */?></a>
                        le <?/*= $billet->getDate() */?></p>
                </div>
            </div>
        </div>
    </div>
--><?php /*} */?>

<table class="table">
    <tr  class="">
        <th >Titre du Billet</th>
        <th>Mise à jour</th>
        <th>Suppression</th>
    </tr>
<!--    --><?php //foreach ($array['donneeBillet'] as $billet){ ?>
    <tr>
        <td >Titre</td>
        <td ><a href=""><i class="fa fa-refresh"></i>Mise à jour</a></td>
        <td ><a href=""><i class="fa fa-trash"></i>Suppression</a></td>
    </tr>
    <tr>
        <td>titre</td>
        <td><input type="radio" name="modif" value="update"></td>
        <td><input type="radio" name="modif" value="delete"></td>
    </tr>
<!--    --><?php //} ?>
</table>


<!--<a href="/app/admin/miseAJour"><button>Modifier un Billet</button></a>-->
<!--<a href="/app/admin/effacement"><button>Supprimer un Billet</button></a>-->



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


