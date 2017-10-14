<?php
namespace App\Vue\BilletAffichageVue;

use App\Controler\BilletControler;
use App\Model\DAO\BilletDAO;
?>
<?php ob_start(); ?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="titre">
            <?php echo $donneeBilletRead['titre']  ; ?>
        </h2>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <p class="contenu">
                <?php echo $get['contenu']; ?>
            </p>
        </div>
    </div>
<div class="row">
    <div class="col-lg-12">
        <auteur>
            <?php echo $get['auteur']; ?>
        </auteur>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <date>
            <?php echo $get['date']; ?>
        </date>
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php include 'gabarit.php'; ?>


