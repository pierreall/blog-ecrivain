<?php if(!empty($array['donneeBillet'])) : ?>
    <?php foreach ($array['donneeBillet'] as $billet) {?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview">
                        <?php echo '<a href="/app/billet/affichage/'.$billet->getId().'">';?>
                        <h2 class="post-title">
                            <?= $billet->getTitre() ?>
                        </h2>
                        </a>
                        <p class="post-meta">Posté par
                            <strong><?= $billet->getAuteur() ?></strong>
                            le <?= $billet->getDate() ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php else : ?>
    <div class="container">
        <div class="alert alert-info">Aucun billet à afficher.</div>
    </div>
<?php endif; ?>

