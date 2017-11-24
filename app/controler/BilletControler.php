<?php

namespace App\Controler;
use App\Model\DAO\PostDAO;


class BilletControler extends Controler
{

    protected $billet;
    public function __construct ()
    {
//        echo __CLASS__. ' construit <br>';
        $this->billet = new PostDAO();
    }
    public function index(){
        $this->affichageAll();
    }
    public function ajout(){
//        echo 'appel de la méthode '. __METHOD__;
        require 'app/view/admin/add_post.php';
        if(isset($_POST['title']) && isset($_POST['content_post'])){
            $this->billet->create();
        }
    }

    /**
     *  default method, display all tickets (homepage)
     */
    public function affichageAll(){
        $donneeBilletAll = $this->billet->readAll();
//        var_dump($donneeBilletAll);
//        $this->viewTemplate('app/view/BilletAffichageAllVue.php','app/view/admin/Template.php', 'Bienvenue');
        ob_start();
        require 'app/view/BilletAffichageAllVue.php';
        ob_end_flush();
    }

    public function affichage($id_post){
        if(isset($id_post) && is_numeric($id_post)) {
            if ($this->billet->read($id_post)){
                $donneeBilletRead = $this->billet->read($id_post);
                ob_start();
                require 'app/view/BilletAffichageVue.php';
                ob_end_flush();
            }
            else {
                ErreurControler::methodNoExist();
            }
        }
        else {
            $donneeBilletRead = $this->billet->read(1);
            ob_start();
            require 'app/view/BilletAffichageVue.php';
            ob_end_flush();
        }
    }

    public function miseAJour(){
        $this->billet->update();
    }

    public function effacement(){
        $this->billet->delete();
    }

}

