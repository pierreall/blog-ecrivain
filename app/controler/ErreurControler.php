<?php

namespace App\Controler;


class ErreurControler extends Controler {
    public static $method = true;
    public static $control = true;

    public function __construct ()
    {
//        ob_start();
//        include 'app/view/Erreur.php';
    }

//    static public function controlerNoExist(){
//     ob_start();
//        include "app/view/Erreur.php";
//
//    }

   static public function methodNoExist(){
//       self::$method = false;
//       ob_start();
//       include 'app/view/Erreur.php';
//       ->viewTemplate('app/view/Erreur.php','app/view/post.html', 'Erreur 404');
       header('Location: /app/erreur/noExist');

    }

    public function noExist(){
        $this->viewTemplate('app/view/Erreur.php', 'app/view/admin/Template.php', 'Erreur 404');
    }

}