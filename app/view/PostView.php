<!-- Page Header -->
<header class="masthead" style="background-image: url('/app/view/img/paysage2.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><?= $titlePost ?></h1>
                    <span class="meta">Posté par
                        <?= $authorPost ?>
                        le <?= $datePost ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?= $contentPost ?>
                <hr>
                <a href="/app/commentaire/affichageCommentaire/<?= $idPost ?>"><?= $nbrComment ?> Commentaire(s)</a>
            </div>
        </div>
    </div>
</article>

