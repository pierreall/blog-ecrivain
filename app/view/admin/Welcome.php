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
<div class="btn-group btn-group">
    <div class="btn-group">
        <a href="/app/admin/ajout"><button class="btn btn-default">Ajouter un Billet</button></a>
    </div>
    <div class="btn-group">
        <a href=""><button class="btn btn-default">Modérer les commentaires</button></a>
    </div>
</div>


<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th >Titre du Billet</th>
            <th>Mise à jour</th>
            <th>Suppression</th>
        </tr>
        </thead>

        <?php foreach ($array['donneeBillet'] as $billet){ ?>
            <tr>
                <td ><?= $billet->getTitre() ?></td>
                <?php
                echo '<td ><a href="/app/admin/miseAJour/'.$billet->getId().'"><i class="fa fa-refresh"></i></a></td>';
                echo '<td id="suppr" ><a href="/app/admin/effacement/'.$billet->getId().'"><i class="fa fa-trash"></i></a></td>';
                ?>
            </tr>
        <?php } ?>
    </table>
</div>



<?php if(isset($_GET['suppr']) && $_GET['suppr'] == "interdit"){
    echo '<div class="alert alert-warning">Impossible de supprimer le dernier billet</div>';
}
?>




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


