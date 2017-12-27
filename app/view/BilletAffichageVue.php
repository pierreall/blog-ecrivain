<!-- Page Header -->
<header class="masthead" style="background-image: url('/app/view/img/paysage.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><?= $titreBillet ?></h1>
                    <!--              <h2 class="subheading">Problems look mighty small from 150 miles up</h2>-->
                    <span class="meta">Posté par
                <a href="#"><?= $auteurBillet ?></a>
                le <?= $dateBillet ?></span>
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
                <?= $contenuBillet ?>
                <hr>
                <a href="/app/commentaire/affichageCommentaire/<?= $idBillet ?>">Commentaire(s)</a>
            </div>
        </div>
    </div>
</article>