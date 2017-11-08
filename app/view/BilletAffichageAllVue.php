<?php //foreach ($donneeBilletAll as $billet) {
//
//?>
<!--<div class="row">-->
<!--    <div class="col-lg-12">-->
<!--        <h2 class="titre">-->
<!--            --><?php //echo $billet->getTitre() ; ?>
<!--</h2>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--    <div class="col-lg-12">-->
<!--        <p class="contenu">-->
<!--            --><?php //echo $billet->getContenu(); ?>
<!--        </p>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="row">-->
<!--    <div class="col-lg-12">-->
<!---->
<!--            --><?php //echo 'auteur : '.$billet->getAuteur(); ?>
<!--    </div>-->
<!--</div>-->
<!--<div class="row">-->
<!--    <div class="col-lg-12">-->
<!---->
<!--            --><?php //echo  $billet->getDate(); ?>
<!--    </div>-->
<!--</div>-->
<?php //}?>

<?php /*foreach ($donneeBilletAll as $billet) {*/?><!--
<!-- Main Content -->
<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="col-lg-8 col-md-10 mx-auto">-->
<!--            <div class="post-preview">-->
<!--                <a href="post.html">-->
<!--                    <h2 class="post-title">-->
<!--                        <!-- Man must explore, and this is exploration at its greatest-->
<!--                        --><?php ///*echo $billet->getTitre(); */?>
<!--                    </h2>-->
<!--<!--                    <h3 class="post-subtitle">-->
<!--<!--                        Problems look mighty small from 150 miles up-->
<!--<!--                    </h3>-->
<!--                </a>-->
<!--                <p class="post-meta">Posté par-->
<!--                    <a href="#">--><?php ///*echo $billet->getAuteur();*/?><!--</a>-->
<!--                    le --><?php ///*echo $billet->getDate();*/?><!--</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--            <hr>-->
<?php //}?>



<?php $contenu = ob_get_contents();?>
<?php //var_dump($contenu);?>

<?php $title = 'Accueil' ; ?>
<?php include 'app/view/index.html'; ?>



