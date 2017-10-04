<?php

namespace App\Controler;

use App\Model\DAO\UtilisateurDAO;

class UtilisateurControler {

    protected $utilisateur;
    public function __construct ()
    {
        echo __CLASS__.'construit';
        $this->utilisateur = new UtilisateurDAO();
    }

    public function ajout(){

        echo 'appel de la méthode '. __METHOD__;
        $this->utilisateur->create();

    }

    public function affichage(){
        $this->utilisateur->read();
    }

    public function miseAJour(){
        $this->utilisateur->update();
    }

    public function effacement(){
        $this->utilisateur->delete();
    }

}

