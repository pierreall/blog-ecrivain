<?php
$contenu = $donneeBilletRead[0]->getContenu();
$title = $donneeBilletRead[0]->getTitre() ;
$date = $donneeBilletRead[0]->getDate();
$auteur = $donneeBilletRead[0]->getAuteur();
?>
<?php include 'app/vue/post.html'; ?>



