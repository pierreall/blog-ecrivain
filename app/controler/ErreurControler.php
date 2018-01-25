<?php

namespace App\Controler;


class ErreurControler extends Controler {


    public function __construct ()
    {

    }
    public function index(){
        $this->noExist();
    }

    static public function methodNoExist(){ //old static method used for error handling, redirected to noExist ()
        header('Location: /app/erreur/noExist');
    }

    public function noExist(){
        session_start();
        $this->viewTemplate('app/view/ErrorView.php', 'app/view/Error.php', 'Erreur 404');
    }

}