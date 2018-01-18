<?php

namespace App\Controler;
use App\Model\DAO\CommentDAO;
use App\Model\DAO\PostDAO;



class BilletControler extends Controler
{

    protected $billet;

    public function __construct ()
    {
//        echo __CLASS__. ' construit <br>';
        $this->billet = new PostDAO();
    }
    // méthod par défault
    public function index(){
        $this->affichageAll();
    }

    /**
     *  default method, display all tickets (homepage)
     */
    public function affichageAll(){
        session_start();
        $donneeBilletAll = $this->billet->readAll();
        $var_array = array("donneeBillet" => $donneeBilletAll);
        $this->viewTemplate('app/view/BilletAffichageAllVue.php','app/view/index.php', 'Bienvenue', $var_array);
    }

    public function affichage($id_post){
        session_start();
        if(isset($id_post) && is_numeric($id_post)) {
            if ($this->billet->read($id_post)){
                $donneeBilletRead = $this->billet->read($id_post);
                $comment = new CommentDAO();
                $compteur = $comment->commentCounter($id_post);

                $var_array = array("titreBillet" => $donneeBilletRead[0]->getTitre(),
                    "auteurBillet" => $donneeBilletRead[0]->getAuteur(),
                    "dateBillet" => $donneeBilletRead[0]->getDate(),
                    "contenuBillet" => $donneeBilletRead[0]->getContenu(),
                    "idBillet" => $id_post,
                    "nbrCommentaire" => $compteur[0]
                );
                    $this->viewTemplate('app/view/BilletAffichageVue.php', 'app/view/post.php', $var_array, $var_array);
            }
            else {
//                ErreurControler::methodNoExist();
                header('Location: /app/erreur/noExist');
            }
        }
        else {
            $this->affichage_dernier_billet();
        }
    }

    public function affichage_dernier_billet(){
        session_start();
        $lastPost = $this->billet->returnLastPost();
        $comment = new CommentDAO();
        $compteur = $comment->commentCounter($lastPost[0]->getId());
        $var_array = array("titreBillet" => $lastPost[0]->getTitre(),
            "auteurBillet" => $lastPost[0]->getAuteur(),
            "dateBillet" => $lastPost[0]->getDate(),
            "contenuBillet" => $lastPost[0]->getContenu(),
            "idBillet" =>$lastPost[0]->getId(),
            "nbrCommentaire" => $compteur[0]);
        $this->viewTemplate('app/view/BilletAffichageVue.php', 'app/view/post.php', $var_array, $var_array);
    }


}

