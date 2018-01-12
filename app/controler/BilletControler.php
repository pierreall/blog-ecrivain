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
    public function index(){
        $this->affichageAll();
    }

    /**
     *  default method, display all tickets (homepage)
     */
    public function affichageAll(){
        $donneeBilletAll = $this->billet->readAll();
        $var_array = array("donneeBillet" => $donneeBilletAll);
        $this->viewTemplate('app/view/BilletAffichageAllVue.php','app/view/index.html', 'Bienvenue', $var_array);
    }

    public function affichage($id_post){
        if(isset($id_post) && is_numeric($id_post)) {
            if ($this->billet->read($id_post)){
                $donneeBilletRead = $this->billet->read($id_post);
                $commentaire = new CommentDAO();
                $compteur = $commentaire->commentCounter($id_post);
                //var_dump($compteur);
                //var_dump($donneeBilletRead[0]->getContenu());
                $var_array = array("titreBillet" => $donneeBilletRead[0]->getTitre(),
                    "auteurBillet" => $donneeBilletRead[0]->getAuteur(),
                    "dateBillet" => $donneeBilletRead[0]->getDate(),
                    "contenuBillet" => $donneeBilletRead[0]->getContenu(),
                    "idBillet" => $id_post,
                    "nbrCommentaire" => $compteur[0]
                );
                    $this->viewTemplate('app/view/BilletAffichageVue.php', 'app/view/post.html', $var_array, $var_array);
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
        $lastPost = $this->billet->returnLastPost();
        $commentaire = new CommentDAO();
        $compteur = $commentaire->commentCounter($lastPost[0]->getId());
        $var_array = array("titreBillet" => $lastPost[0]->getTitre(),
            "auteurBillet" => $lastPost[0]->getAuteur(),
            "dateBillet" => $lastPost[0]->getDate(),
            "contenuBillet" => $lastPost[0]->getContenu(),
            "idBillet" =>$lastPost[0]->getId(),
            "nbrCommentaire" => $compteur[0]);
        $this->viewTemplate('app/view/BilletAffichageVue.php', 'app/view/post.html', $var_array, $var_array);
    }


}

