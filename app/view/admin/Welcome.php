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



<table class="table">
    <tr  class="">
        <th >Titre du Billet</th>
        <th>Mise à jour</th>
        <th>Suppression</th>
    </tr>
    <?php foreach ($array['donneeBillet'] as $billet){ ?>
        <tr>
            <td ><?= $billet->getTitre() ?></td>
            <?php echo '<td ><a href="/app/admin/miseAJour/'.$billet->getId().'"><i class="fa fa-refresh"></i></a></td>';
        echo '<td id="suppr" ><a href="/app/admin/effacement/'.$billet->getId().'"><i class="fa fa-trash"></i>'.if($_GET["post"] = 1){ echo "impossible de supprimer ce billet";}.'</a></td>' ; ?>
        </tr>
    <?php } ?>
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


