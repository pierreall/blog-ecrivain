<?php

namespace App\Controler;
use App\Model\DAO\BilletDAO;
use  App\Vue\BilletAffichageVue;



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
            $this->billet->read($id_post);

            include 'App\Vue\BilletAffichageVue.php';
        }

        echo 'appel de la méthode '. __METHOD__ .' <br> paramètre = '.$id_post;



    }

    public function miseAJour(){
        $this->billet->update();
    }

    public function effacement(){
        $this->billet->delete();
    }

}

