<?php

namespace App\Controler;
use App\model\DAO\BilletDAO;


class BilletControler
{

    protected $billet;
    public function __construct ()
    {
        echo __CLASS__. 'construit';
        $this->billet = new BilletDAO();
    }

    public function ajout(){
        echo 'appel de la méthode '. __METHOD__;
        $this->billet->read();

    }

    public function affichage($id_post){
        $this->billet->read();
    }

    public function miseAJour(){
        $this->billet->update();
    }

    public function effacement(){
        $this->billet->delete();
    }

}

