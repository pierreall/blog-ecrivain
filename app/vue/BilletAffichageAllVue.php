<?php while ($donneeBilletReadAll = $donneeBilletAll->fetchAll()){?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="titre">
            <?php echo $donneeBilletReadAll['titre'] ; ?>
</h2>
</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <p class="contenu">
            <?php echo $donneeBilletReadAll['contenu']; ?>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <auteur>
            <?php echo 'auteur : '.$donneeBilletReadAll['auteur']; ?>
        </auteur>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <date>
            <?php echo  $donneeBilletReadAll['date']; ?>
        </date>
    </div>
</div>
<?php }?>


<!--</section>-->
<?php $contenu = ob_get_contents();?>
<?php //var_dump($contenu);?>

<?php $title = 'Accueil' ; ?>
<?php include 'app/vue/gabarit.php'; ?>



