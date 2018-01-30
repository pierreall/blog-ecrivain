<header class="masthead" style="background-image: url('/app/view/img/landscape.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><?= $titlePost ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="btn-group">
        <a href="/app/billet/affichage/<?= $IdPost ?>" class="btn btn-outline-info" role="button" aria-pressed="true">Retourner sur le Billet</a>
    </div>
    <hr>
    <form action="/app/commentaire/affichageCommentaire/<?= $IdPost ?>" method="post">
        <div class="form-group">
            <label for="author">Pseudo/ ou nom</label>
            <input type="text" name="author" id="author" placeholder="Votre pseudo" class="form-control">
        </div>
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="title" id="titre" placeholder="titre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Commentaire</label>
            <textarea name="content_com" id="" cols="30" rows="10" required class="form-control"
                      placeholder="Votre commentaire">

    </textarea>
        </div>

        <input type="submit" value="envoyer" class="btn btn-default">
    </form>
</div>

<hr>
<br>
<?php foreach ($array['dataComment'] as $comment) {?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview border alert alert-info">

                    <h2 class="post-title" style="font-size: 1.25em;">
                        <?= $comment->getTitre() ?>
                    </h2>
                    <p style="font-size: 0.8em;">
                        <?= $comment->getContenu();?>
                    </p>
                    <p class="post-meta" style="font-size: 0.7em">Posté par
                        <?= $comment->getAuteur() ?>
                        le <?= $comment->getDate() ?>

                        <br> <a href="/app/admin/signalement/<?= $comment->getId () ?>"><i class="fa fa-exclamation-triangle" aria-hidden="true">Signaler ce message</i></a>
<!--                    <hr>-->
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
<?php } ?>

