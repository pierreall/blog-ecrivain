<!--<section class="container well">-->
<?php //ob_start();?>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="titre">
                <?php echo $donneeBilletRead['titre'] ; ?>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p class="contenu">
                <?php echo $donneeBilletRead['contenu']; ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <auteur>
                <?php echo 'auteur : '.$donneeBilletRead['auteur']; ?>
            </auteur>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <date>
                <?php echo  $donneeBilletRead['date']; ?>
            </date>
        </div>
    </div>
<!--</section>-->
<?php $contenu = ob_get_contents();?>
<?php //var_dump($contenu);?>

<?php $title = $donneeBilletRead['titre'] ; ?>
<?php include 'app/vue/gabarit.php'; ?>



