<!--view for moderation of comments in admin area-->

<div class="form-group">
    <a href="/app/admin/home" class="btn btn-outline-info" role="button" aria-pressed="true">Retour Accueil Administration</a>
</div>
<?php if (!empty($array['moderateComment'])) : ?>
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
            </thead>

            <?php foreach ($array['moderateComment'] as $commentaire) { ?>

                <tr>
                    <?php echo '<form action="/app/admin/validationEditComment/'.$commentaire->getId().'" method="post">'; ?>
                    <td><input type="text" value="<?= $commentaire->getTitre() ?>" name="title" style="font-size: 0.85em;"></td>
                    <td><textarea name="content_com" cols="17" rows="3" style="font-size: 0.85em;"><?= $commentaire->getContenu() ?></textarea></td>
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
<?php else : ?>
    <div class="alert alert-info">Aucun Commentaire</div>
<?php endif; ?>