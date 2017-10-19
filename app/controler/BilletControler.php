<?php

namespace App\Controler;
use App\Model\DAO\BilletDAO;


class BilletControler
{

    protected $billet;
    public function __construct ()
    {
        echo __CLASS__. ' construit <br>';
        $this->billet = new BilletDAO();
    }

    public function ajout(){
        echo 'appel de la méthode '. __METHOD__;
        $this->billet->create();


    }

    public function affichage($id_post){
        if(isset($id_post)){

            $donneeBilletRead = $this->billet->read($id_post);


//            ob_start();
            include 'app/vue/BilletAffichageVue.php';
//            $contenu = ob_end_flush();
        }

    }

    public function miseAJour(){
        $this->billet->update();
    }

    public function effacement(){
        $this->billet->delete();
    }

}

