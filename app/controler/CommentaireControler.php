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
    //default method
    public function index(){
        header('Location: /');
    }

//add new comments and display created and existing comments related to the post
    public function affichageCommentaire($id_post){
        session_start();
        if (isset($id_post) && is_numeric($id_post)){
            $post = new PostDAO();
            if(!$post->read($id_post)){
                ErreurControler::methodNoExist();
                exit();
            }
            $comment = new CommentDAO();
            if(isset($_POST['title']) && isset($_POST['content_com'])){

                $comment->create($id_post);//add comment in database
            }


            $allCommentsData = $comment->read($id_post);
            $post_com = $post->read($id_post);
            $var_array = array("dataComment" => $allCommentsData,
                "IdPost" => $id_post,
                "titlePost" => 'Commentaire(s) : '.$post_com[0]->getTitre()
            );

            $this->viewTemplate('app/view/commentView.php','app/view/post.php', '', $var_array);

        } else {
            ErreurControler::methodNoExist();
        }
    }

    //retrieve the number of comments that will be displayed on the post page
    public function compteurCommentaire($id_post){
        if (isset($id_post) && is_numeric($id_post)){
            $comment = new CommentDAO();
            $comment->commentCounter($id_post);
        }
    }


}