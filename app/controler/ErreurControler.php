<?php

namespace App\Controler;


class ErreurControler extends Controler {
    public static $method = true;
    public static $control = true;

    public function __construct ()
    {
//        ob_start();
//        include 'app/view/ErrorView.php';
    }
//    public function index(){
//        $this->noExist();
//    }

//    static public function controlerNoExist(){
//     ob_start();
//        include "app/view/ErrorView.php";
//
//    }

   static public function methodNoExist(){
//       self::$method = false;
//       ob_start();
//       include 'app/view/ErrorView.php';
//       ->viewTemplate('app/view/ErrorView.php','app/view/post.php', 'Erreur 404');
       header('Location: /app/erreur/noExist');

    }

    public function noExist(){
        session_start();
        $this->viewTemplate('app/view/ErrorView.php', 'app/view/Error.php', 'Erreur 404');
    }

}