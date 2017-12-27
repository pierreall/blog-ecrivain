<form action="/app/commentaire/affichageCommentaire/<?= $IdBillet ?>" method="post">
    <div class="form-group">
        <label for="">Pseudo/ ou nom</label>
        <input type="text" name="author" placeholder="Votre pseudo" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Titre</label>
        <input type="text" name="title" placeholder="titre" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Commentaire</label>
        <textarea name="content_com" id="" cols="30" rows="10" required class="form-control">
        Votre commentaire
    </textarea>
    </div>

    <input type="submit" value="envoyer" class="btn btn-default">
</form>
<hr>
<br>
<?php foreach ($array['donneeCommentaire'] as $commentaire) {?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview border border-default">

                    <h2 class="post-title" style="font-size: 1.25em;">
                        <?= $commentaire->getTitre() ?>
                    </h2>
                    <p style="font-size: 0.8em;">
                        <?= $commentaire->getContenu();?>
                    </p>
                    <p class="post-meta" style="font-size: 0.8em">Posté par
                        <?= $commentaire->getAuteur() ?>
                        le <?= $commentaire->getDate() ?></p>
                    <a href="/app/admin/commentaire/"><i class="fa fa-exclamation-triangle" aria-hidden="true">Signaler ce message</i></a>
                    <hr>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
