<?php
namespace App\Controler;


use App\Model\DAO\CommentDAO;
use App\Model\DAO\PostDAO;
use App\Model\DAO\UserDAO;


class AdminControler extends Controler
{


    public function __construct ()
    {

    }
// default method
    public function index(){
        if(isset($_SESSION['pseudo'])){
            header('Location: /app/admin/home');
        }
        else {
            header('Location: /app/admin/login');

        }
    }

//login to admin area
    public function login()
    {
        session_start();
        if (!isset($_SESSION['pseudo'])){
            $this->viewTemplate('app/view/admin/login.php', 'app/view/admin/Template.php', 'Connection administration');
        }
        else {
            header('Location: /app/admin/home');
        }
    }
    //logout session and admin area
    public function logout(){
        session_start();
        session_destroy();
        header('Location: /');

    }


//admin home page, moderate table for post
    public function home(){
        session_start();
        if(isset($_SESSION['pseudo'])) {
            $post = new PostDAO();
            $allPostData = $post->readAll();
            $var_array = array("donneeBillet" => $allPostData);
            $this->viewTemplate('app/view/admin/Welcome.php', 'app/view/admin/Template.php', 'Accueil Administration', $var_array);
        }
        else {
            header('Location: /app/admin/login');
        }

    }

    //check if the login of the administrator area correspond to those registered in the database
    public function verif(){

        session_start();

        if(isset($_POST['pseudo']) && isset($_POST['password'])){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mdp = htmlspecialchars($_POST['password']);

            $user = new UserDAO();
            $row = $user->verif();


            if (!empty($row)) {

                $isOk = password_verify($mdp, $row[0]['password']);

                if ($isOk) {
                    $_SESSION['pseudo'] = $row[0]['pseudo'];
                    header('Location: /app/admin/home');
                } else {
                    echo "verifiez vos données";
                    header('Location: /app/admin/login');
                    die();
                }
            } else {
                echo "cet utilisateur n'existe pas.";
                header('Location: /app/admin/login');
            }


        } else {
            header('Location: /app/admin/login');
        }

    }
    //add a new post
    public function ajout(){
        session_start();
        if (isset($_SESSION['pseudo'])){
            $this->viewTemplate('app/view/admin/addPostView.php','app/view/admin/Template.php', 'Ajout d\'un nouveau Billet');
            if(isset($_POST['title']) && isset($_POST['content_post'])){
                $post = new PostDAO();
                $post->create();
            }
        }
        else {
            header('Location: /app/admin/login');
        }
    }
//update of a blog post: retrieves the contents of the post and displays it in a WYSIWYG interface
    public function miseAJour($id_post)
    {
        session_start();
        if (isset($_SESSION['pseudo'])){
            if (isset($id_post) && is_numeric($id_post)) {
                $post = new PostDAO();
                if ($post->read($id_post)) {
                    $dataPostRead = $post->read($id_post);
                    $var_array = array("title" => $dataPostRead[0]->getTitre(),
                        "contenuBillet" => $dataPostRead[0]->getContenu(),
                        "idBillet" => $id_post);
                    $this->viewTemplate('app/view/admin/updatePostView.php', 'app/view/admin/Template.php', $var_array, $var_array);
                } else {
                    ErreurControler::methodNoExist();
                }
            }
        }
        else {
            header('Location: /app/admin/login');
        }

    }
//update of a blog post : records in database the change made on the post.
    public function validationMiseAJour($id_post){
        session_start();
        if(isset($_SESSION['pseudo'])){
            if (isset($id_post) && is_numeric($id_post)){

                if(isset($_POST['title']) && isset($_POST['content_post'])){
                    $post = new PostDAO();
                    $post->update($id_post);
                    header('Location: /app/billet/affichage/'.$id_post);
                }
                else {
                    header('Location: /app/admin/home');
                }
            }

        }
        else {
            header('Location: /app/admin/login');
        }

    }

//delete a blog post
    public function effacement($id_post){
        session_start();
        if (isset($_SESSION['pseudo'])){
            $post = new PostDAO();
            $tab = $post->returnLastPost();

            if ($id_post !== $tab[0]->getId()){

                $post->delete($id_post);
                header('Location: /app/admin/home');

            }
            else {
                header('Location: /app/admin/home/?suppr=interdit');
            }

        }
        else {
            header('Location: /app/admin/login');
        }
    }
    //method called when a user  signals a comment
    public function signalement($id_comment){
        if (isset($id_comment) && is_numeric($id_comment)){
            $commentModerate = new CommentDAO();
            $commentModerate->reportComment($id_comment);
            if (isset($_SERVER['HTTP_REFERER'])){
                header('Location: '.$_SERVER['HTTP_REFERER']);
            }
            else {
                header('Location: /');
            }
        }
        else {
            ErreurControler::methodNoExist();
        }
    }

    //retrieves all comments and post it in admin area for possible moderations
    public function commentaireAModerer(){
        session_start();
        if (isset($_SESSION['pseudo'])){
            $comment = new CommentDAO();
            $commentAModerer = $comment->commentReported();
            $var_array = array("moderateComment" => $commentAModerer
            );
            $this->viewTemplate('app/view/admin/moderation.php', 'app/view/admin/Template.php', 'Modération des Commentaires', $var_array);
        }
    }

    // update in database moderate comments
    public function validationEditComment($id_comment){
        session_start();
        if(isset($_SESSION['pseudo'])){
            if (isset($id_comment) && is_numeric($id_comment)){
                $com = new CommentDAO();
                if ($com->readUnique($id_comment)){
                    if(isset($_POST['title']) && isset($_POST['content_com'])){
                        $comment = new CommentDAO();
                        $comment->update($id_comment);
                        header('Location: /app/admin/commentaireAModerer');
                    }
                    else {
                        header('Location: /app/admin/home');
                    }
                }
                else {
                    header('Location: /app/admin/home');
                }
            }
        }
        else {
            header('Location: /app/admin/login');
        }
    }

//delete a comment from the database
    public function supprimerCommentaire ($id_comment)
    {
        session_start();
        if (isset($_SESSION['pseudo'])){
            $comment = new CommentDAO();
            $comment->delete($id_comment);
            header('Location: /app/admin/commentaireAModerer');
        }
        else {
            header ('Location: /app/admin/login');
        }
    }
}
