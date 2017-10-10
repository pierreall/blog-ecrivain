<?php

namespace App\Controler;


class ErreurControler {
    public function __construct ()
    {
        echo 'oups rien trouvé !';
//        require '../vue/Erreur.php';
    }

   static public function methodNoExist(){
        echo 'la méthode n\'existe pas';
    }

}