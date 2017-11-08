<?php
//use App\Controler\ErreurControler;
//?>
<p class="alert alert-info">
    Pages non trouvé
</p>

<?php $contenu = ob_get_contents();?>
<?php $title = 'Erreur 404' ?>
<?php include_once 'app/view/gabarit.php'; ?>
