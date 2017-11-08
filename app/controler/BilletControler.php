<?php

namespace App\Controler;
use App\Model\DAO\PostDAO;


class BilletControler
{

    protected $billet;
    public function __construct ()
    {
//        echo __CLASS__. ' construit <br>';
        $this->billet = new PostDAO();
    }

    public function ajout(){
        echo 'appel de la méthode '. __METHOD__;
        $this->billet->create();


    }

    /**
     *  default method, display all tickets (homepage)
     */
    public function affichageAll(){
        $donneeBilletAll = $this->billet->readAll();
//        var_dump($donneeBilletAll);
        ob_start();
        require 'app/view/BilletAffichageAllVue.php';
        ob_end_flush();
    }

    public function affichage($id_post){
        if(isset($id_post)) {

            $donneeBilletRead = $this->billet->read($id_post);


            ob_start();
            require 'app/view/BilletAffichageVue.php';
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

