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
                <a href="#">
<!--                    <img class="img-fluid" src="/app/view/img/post-sample-image.jpg" alt="">-->
                    <!--<img class="img-fluid" src="" alt="">-->
                </a>
<!--                <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>-->

<!--                <p>Placeholder text by-->
<!--                    <a href="http://spaceipsum.com/">Space Ipsum</a>. Photographs by-->
<!--                    <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>.</p>-->
                <hr>
                <a href="#">Commentaire(s)</a>
            </div>
        </div>
    </div>
</article>