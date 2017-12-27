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

//    public function ajouter($id_post){
//
//        if (isset($id_post) && is_numeric($id_post)){
//            $var_array = array("IdBillet" => $id_post);
//            $this->viewTemplate('app/view/commentaireVue.php','app/view/admin/Template.php', 'Ajout d\'un nouveau commentaire', $var_array);
//            if(isset($_POST['title']) && isset($_POST['content_com'])){
//                $commentaire = new CommentDAO();
//                $commentaire->create($id_post);
//                header('Location: /app/commentaire/affichageCommentaire');
//            }
//        }
//        else {
//            header('Location: /app/billet/affichage/'.$id_post);
//        }
//    }
    public function affichageCommentaire($id_post){
        if (isset($id_post) && is_numeric($id_post)){

            // todo afficher les commentaires lié au post $id_post
            $commentaire = new CommentDAO();
            $donneeCommentairetAll = $commentaire->read($id_post);
            $var_array = array("donneeCommentaire" => $donneeCommentairetAll,
                "IdBillet" => $id_post);

            $this->viewTemplate('app/view/commentaireVue.php','app/view/admin/Template.php', 'Commentaire', $var_array);
            if(isset($_POST['title']) && isset($_POST['content_com'])){
                var_dump($_POST);
                var_dump('test creation');
                $commentaire->create($id_post);
//                header('Location: /app/commentaire/affichageCommentaire');
           }

        }
    }
//    public function miseAJour(){
//
//    }
//    public function supprimer(){
//
//    }

}