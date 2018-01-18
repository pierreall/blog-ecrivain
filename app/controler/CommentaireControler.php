<?php

namespace App\Controler;

use App\Controler\Controler;
use App\Model\DAO\Comment;
use App\Model\DAO\CommentDAO;
use App\Model\DAO\PostDAO;

class CommentaireControler extends Controler{

    public function __construct ()
    {

    }
    //method par default
    public function index(){
        header('Location: /');
    }

//permet d'ajouter des nouveaux commentaires et affiche les commentaires créé et existant lié au billet
    public function affichageCommentaire($id_post){
        session_start();
        if (isset($id_post) && is_numeric($id_post)){
            $billet = new PostDAO();
            if(!$billet->read($id_post)){
                ErreurControler::methodNoExist();
                exit();
            }
            $commentaire = new CommentDAO();
            if(isset($_POST['title']) && isset($_POST['content_com'])){

                $commentaire->create($id_post);
            }


            $donneeCommentairetAll = $commentaire->read($id_post);
            $pos_com = $billet->read($id_post);
            $var_array = array("donneeCommentaire" => $donneeCommentairetAll,
                "IdBillet" => $id_post,
                "titreBillet" => 'Commentaire(s) : '.$pos_com[0]->getTitre()
            );

            $this->viewTemplate('app/view/commentaireVue.php','app/view/post.php', '', $var_array);

        } else {
            ErreurControler::methodNoExist();
        }
    }

    //récupére le nombre de commentaire qui sera ensuite affichagé sur la page du billet
    public function compteurCommentaire($id_post){
        if (isset($id_post) && is_numeric($id_post)){
            $commentaire = new CommentDAO();
            $commentaire->commentCounter($id_post);
        }
    }


}