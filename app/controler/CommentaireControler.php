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

    public function commenter($id_post){

        if (isset($id_post) && is_numeric($id_post)){
            //$this->viewTemplate('app/view/admin/addCommentView.php','app/view/comment.php', 'Ajout d\'un nouveau commentaire');
            if(isset($_POST['title']) && isset($_POST['content_post'])){
                $commentaire = new CommentDAO();
                $commentaire->create();
            }
        }
        else {
            header('Location: /app/billet/affichage/'.$id_post);
        }
    }
    public function affichageCommentaire($id_post){
        if (isset($id_post) && is_numeric($id_post)){
            // todo afficher les commentaires lié au post $id_post
        }
    }
//    public function miseAJour(){
//
//    }
//    public function supprimer(){
//
//    }

}