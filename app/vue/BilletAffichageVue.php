<?php ob_start();
?>
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
            <?php echo $donneeBilletRead['auteur']; ?>
        </auteur>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <date>
            <?php //echo $get['date']; ?>
        </date>
    </div>
</div>
<?php $contenu = ob_end_flush()?>
<?php $title = 'Le titre de la page'; ?>
<?php include 'gabarit.php'; ?>


