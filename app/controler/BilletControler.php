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
/*    public function ajout(){
        $this->viewTemplate('app/view/admin/addPostView.php','app/view/admin/Template.php', 'Ajout d\'un nouveau Billet');
        var_dump($_POST);
        if(isset($_POST['title']) && isset($_POST['content_post'])){
            $this->billet->create();
            var_dump('test create');
        }
    }*/

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
                var_dump($donneeBilletRead[0]->getContenu());
                $var_array = array("titreBillet" => $donneeBilletRead[0]->getTitre(),
                    "auteurBillet" => $donneeBilletRead[0]->getAuteur(),
                    "dateBillet" => $donneeBilletRead[0]->getDate(),
                    "contenuBillet" => $donneeBilletRead[0]->getContenu(),
                    "idBillet" => $id_post
                );
                    $this->viewTemplate('app/view/BilletAffichageVue.php', 'app/view/post.html', $var_array, $var_array);
            }
            else {
                ErreurControler::methodNoExist();
            }
        }
        else {
//            $donneeBilletRead = $this->billet->read(1);
//            $var_array = array("titreBillet" => $donneeBilletRead[0]->getTitre(),
//                "auteurBillet" => $donneeBilletRead[0]->getAuteur(),
//                "dateBillet" => $donneeBilletRead[0]->getDate(),
//                "contenuBillet" => $donneeBilletRead[0]->getContenu());
//            $this->viewTemplate('app/view/BilletAffichageVue.php', 'app/view/post.html', $var_array, $var_array);
            $this->affichage_dernier_billet();
        }
    }

    public function affichage_dernier_billet(){
        $lastPost = $this->billet->returnLastPost();
        $var_array = array("titreBillet" => $lastPost[0]->getTitre(),
            "auteurBillet" => $lastPost[0]->getAuteur(),
            "dateBillet" => $lastPost[0]->getDate(),
            "contenuBillet" => $lastPost[0]->getContenu());
        $this->viewTemplate('app/view/BilletAffichageVue.php', 'app/view/post.html', $var_array, $var_array);
    }

   /* public function miseAJour($id_post){
        $this->viewTemplate('app/view/admin/updatePostView.php','app/view/admin/Template.php', 'Mise à jour du  billet '.$id_post);
        $this->billet->update();
    }

    public function effacement(){
        $this->viewTemplate('app/view/admin/deletePostView.php', 'app/view/admin/Template.php', 'suppression de');
        $this->billet->delete();
    }*/

}

