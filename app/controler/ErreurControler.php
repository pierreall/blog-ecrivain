<?php

namespace App\Controler;


class ErreurControler {
    public static $method = true;
    public static $control = true;

    public function __construct ()
    {
        ob_start();
        include 'app/vue/Erreur.php';
    }

//    static public function controlerNoExist(){
//     ob_start();
//        include "app/vue/Erreur.php";
//
//    }

   static public function methodNoExist(){
       self::$method = false;
       ob_start();
       include 'app/vue/Erreur.php';
    }

}