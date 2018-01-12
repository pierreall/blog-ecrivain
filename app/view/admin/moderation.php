<?php
echo '<div class="form-group">
<a href="/app/admin/home"><button class="btn btn-outline-info">Retour Accueil Administration</button></a>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead class="card-header">
        <tr>
            <th >Titre</th>
            <th>Contenu</th>
            <th>Modification</th>
            <th>Suppression</th>
            <th>Signalé</th>
        </tr>
        </thead>' ;?>

<?php foreach ($array['moderateComment'] as $commentaire) { ?>

    <tr>
        <?php echo '<form action="/app/admin/validationEditComment/'.$commentaire->getId().'" method="post">'; ?>
        <td><input type="text" value="<?= $commentaire->getTitre() ?>" name="title"></td>
        <td><textarea name="content_com" cols="16" rows="3"><?= $commentaire->getContenu() ?></textarea></td>
        <?php
        echo '<td ><button type="submit" class="btn btn-default"><i class="fa fa-refresh"></i> modérer</button></td>';
        echo '</form>';
        echo '<td id="suppr" ><a href="/app/admin/supprimerCommentaire/'.$commentaire->getId().'"><i class="fa fa-trash"></i></a></td>';
        echo '<td >';

        if(($commentaire->getModeration()) == true ){
            echo '<span class="fa fa-warning fa-2x" style="color: red;"></span>';
        };
        echo '</td>';
        ?>
    </tr>
<?php } ?>
</table>
</div>



<!--<tr>
    <td><input type="text" value="<?/*= $commentaire->getTitre() */?>" name="title"></td>
    <td><input type="text" value="<?/*= $commentaire->getContenu() */?>" name="content_com"></td>
    <?php
/*    echo '<td ><input type="submit" value="modifier"><a href="/app/admin/editionCommentaire/'.$commentaire->getId().'"><i class="fa fa-refresh"></i></a></td>';
    echo '<td id="suppr" ><a href="/app/admin/supprimerCommentaire/'.$commentaire->getId().'"><i class="fa fa-trash"></i></a></td>';
    */?>
</tr>-->
<!--div class="table-responsive">
<table class="table table-hover">
    <thead>
    <tr>
        <th >Titre du Billet</th>
        <th>Mise à jour</th>
        <th>Suppression</th>
    </tr>
    </thead>

    <?php /*foreach ($array['donneeBillet'] as $billet){ */?>
        <tr>
            <td ><?/*= $billet->getTitre() */?></td>
            <?php
/*            echo '<td ><a href="/app/admin/miseAJour/'.$billet->getId().'"><i class="fa fa-refresh"></i></a></td>';
            echo '<td id="suppr" ><a href="/app/admin/effacement/'.$billet->getId().'"><i class="fa fa-trash"></i></a></td>';
            */?>
        </tr>
    <?php /*} */?>
</table>
</div>-->