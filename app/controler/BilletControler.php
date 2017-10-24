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

    /**
     *  méthode appelé par défaut , affichage l'ensemble des billets (page principale)
     */
    public function affichageAll(){
        $donneeBilletAll = $this->billet->readAll();
        var_dump($donneeBilletAll);
        ob_start();
        require 'app/vue/BilletAffichageAllVue.php';
        ob_end_flush();
    }

    public function affichage($id_post){
        if(isset($id_post)) {

            $donneeBilletRead = $this->billet->read($id_post);


            ob_start();
            require 'app/vue/BilletAffichageVue.php';
//            $contenu = ob_get_flush();




            ob_end_flush();
//            $contenu = ob_get_contents();

        }
    }

    public function miseAJour(){
        $this->billet->update();
    }

    public function effacement(){
        $this->billet->delete();
    }

}

