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
    public function index(){
        header('Location: /');
    }


    public function affichageCommentaire($id_post){
        if (isset($id_post) && is_numeric($id_post)){
            $billet = new PostDAO();
            if(!$billet->read($id_post)){
                ErreurControler::methodNoExist();
                exit();
            }
            $commentaire = new CommentDAO();
            if(isset($_POST['title']) && isset($_POST['content_com'])){
                //var_dump($_POST);
                // var_dump('test creation');
//               $this->ajoutCommentaire($id_post);
                $commentaire->create($id_post);
            }

            // todo afficher les commentaires lié au post $id_post

            $donneeCommentairetAll = $commentaire->read($id_post);

            //var_dump($donneeCommentairetAll);
            $var_array = array("donneeCommentaire" => $donneeCommentairetAll,
                "IdBillet" => $id_post
            );

            $this->viewTemplate('app/view/commentaireVue.php','app/view/admin/Template.php', 'Commentaire'. $id_post, $var_array);

        }
    }

    public function compteurCommentaire($id_post){
        if (isset($id_post) && is_numeric($id_post)){
            $commentaire = new CommentDAO();
            $commentaire->commentCounter($id_post);
        }
    }


}