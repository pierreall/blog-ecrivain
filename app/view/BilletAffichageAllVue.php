<?php foreach ($array['donneeBillet'] as $billet) {?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                   <?php echo '<a href="/app/billet/affichage/'.$billet->getId().'">'?>;
                        <h2 class="post-title">
                            <?= $billet->getTitre() ?>
                        </h2>
                    </a>
                    <p class="post-meta">Posté par
                        <a href="#"><?= $billet->getAuteur() ?></a>
                        le <?= $billet->getDate() ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

