<?php foreach ($donneeBilletAll as $billet) {

?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="titre">
            <?php echo $billet->titre ; ?>
</h2>
</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <p class="contenu">
            <?php echo $billet->contenu; ?>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">

            <?php echo 'auteur : '.$billet->auteur; ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">

            <?php echo  $billet->date; ?>
    </div>
</div>
<?php }?>


<!--</section>-->
<?php $contenu = ob_get_contents();?>
<?php //var_dump($contenu);?>

<?php $title = 'Accueil' ; ?>
<?php include 'app/vue/gabarit.php'; ?>



