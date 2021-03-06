<?php if(!empty($array['dataPost'])) : ?>
    <?php foreach ($array['dataPost'] as $post) {?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview">
                        <?php echo '<a href="/app/billet/affichage/'.$post->getId().'">';?>
                        <h2 class="post-title">
                            <?= $post->getTitre() ?>
                        </h2>
                        </a>
                        <p class="post-meta">Posté par
                            <strong><?= $post->getAuteur() ?></strong>
                            le <?= $post->getDate() ?></p>
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

