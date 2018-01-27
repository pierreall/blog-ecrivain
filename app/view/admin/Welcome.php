<!--view home page admin area, table moderation post-->
<div class="">
    <div class="btn-group">
        <a href="/app/admin/ajout" class="btn btn-outline-info" role="button" aria-pressed="true">Ajouter un Billet</a>

        <a href="/app/admin/commentaireAModerer" class="btn btn-outline-info" role="button" aria-pressed="true">Modérer les commentaires</a>
    </div>
</div>

<hr>

<div class="table-responsive">
    <table class="table table-hover">
        <thead class="card-header">
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

