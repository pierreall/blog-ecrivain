<?php

namespace App\Controler;


class ErreurControler {
    public function __construct ()
    {
        echo 'oups rien trouvé !';
//        require '../vue/Erreur.php';

        ob_start();
        include 'app/vue/Erreur.php';
        ob_end_clean();



    }

   static public function methodNoExist(){
        echo 'la méthode n\'existe pas';
    }

}