<?php

namespace App\Controler;
use App\Model\DAO\CommentDAO;
use App\Model\DAO\PostDAO;



class BilletControler extends Controler
{

    protected $post;

    public function __construct ()
    {
        if (session_status() == PHP_SESSION_NONE){
            session_start();
        }
        $this->post = new PostDAO();
    }
    // default method
    public function index(){
        $this->affichageAll();
    }

    /**
     *  default method, display all tickets (homepage)
     */
    public function affichageAll(){
        $allPostData = $this->post->readAll();
        $var_array = array("dataPost" => $allPostData);
        $this->viewTemplate('app/view/AllPostsView.php','app/view/index.php', 'Bienvenue', $var_array);
    }

    //display a post
    public function affichage($id_post){
        if(isset($id_post) && is_numeric($id_post)) {
            if ($this->post->read($id_post)){
                $dataPostRead = $this->post->read($id_post);
                $comment = new CommentDAO();
                $counter = $comment->commentCounter($id_post);

                $var_array = array("titlePost" => $dataPostRead[0]->getTitre(),
                    "authorPost" => $dataPostRead[0]->getAuteur(),
                    "datePost" => $dataPostRead[0]->getDate(),
                    "contentPost" => $dataPostRead[0]->getContenu(),
                    "idPost" => $id_post,
                    "nbrComment" => $counter[0]
                );
                $this->viewTemplate('app/view/PostView.php', 'app/view/post.php','', $var_array);
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

    //display last post
    public function affichage_dernier_billet(){
        if (!empty($this->post->returnLastPost())) {
            $lastPost = $this->post->returnLastPost();
            $comment = new CommentDAO();
            $counter = $comment->commentCounter($lastPost[0]->getId());
            $var_array = array("titlePost" => $lastPost[0]->getTitre(),
                "authorPost" => $lastPost[0]->getAuteur(),
                "datePost" => $lastPost[0]->getDate(),
                "contentPost" => $lastPost[0]->getContenu(),
                "idPost" =>$lastPost[0]->getId(),
                "nbrComment" => $counter[0]);
            $this->viewTemplate('app/view/PostView.php', 'app/view/post.php','', $var_array);
        }
        else {
            header('Location: /');
        }

    }



}

