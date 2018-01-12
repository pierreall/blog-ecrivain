<?php
namespace App\Controler;


use App\Model\DAO\CommentDAO;
use App\Model\DAO\PostDAO;
use App\Model\DAO\UserDAO;


class AdminControler extends Controler
{
    private $admin;
    public function __construct ()
    {

    }
    public function index(){
        if(isset($_SESSION['pseudo'])){
            header('Location: /app/admin/home');
        }
        else {
            header('Location: /app/admin/login');

        }
    }
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
    public function logout(){
        session_start();
        session_destroy();
        header('Location: /');

    }



    public function home(){
        session_start();
//        var_dump($_SESSION);
        if(isset($_SESSION['pseudo'])) {
            $billet = new PostDAO();
            $donneeBilletAll = $billet->readAll();
            $var_array = array("donneeBillet" => $donneeBilletAll);
//            var_dump($var_array);
            $this->viewTemplate('app/view/admin/Welcome.php', 'app/view/admin/Template.php', 'Accueil Administration', $var_array);
        }
        else {
            header('Location: /app/admin/login');
        }

    }

    public function verif(){

        session_start();

        if(isset($_POST['pseudo']) && isset($_POST['password'])){
            //var_dump($_POST['pseudo']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mdp = htmlspecialchars($_POST['password']);

            $user = new UserDAO();
            $row = $user->verif();

            //var_dump($row);

            if (!empty($row)) {

                $isOk = password_verify($mdp, $row[0]['password']);

                if ($isOk) {
                    $_SESSION['pseudo'] = $row[0]['pseudo'];
                    //var_dump($_SESSION['pseudo']);
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
    public function ajout(){
        session_start();
        //var_dump($_SESSION);
        if (isset($_SESSION['pseudo'])){
            $this->viewTemplate('app/view/admin/addPostView.php','app/view/admin/Template.php', 'Ajout d\'un nouveau Billet');
            // var_dump($_POST);
            if(isset($_POST['title']) && isset($_POST['content_post'])){
                $billet = new PostDAO();
                $billet->create();
                //var_dump('test create');
            }
        }
        else {
            header('Location: /app/admin/login');
        }
    }

    public function miseAJour($id_post)
    {
        session_start();
        if (isset($_SESSION['pseudo'])){
            if (isset($id_post) && is_numeric($id_post)) {
                $billet = new PostDAO();
                if ($billet->read($id_post)) {
                    $donneeBilletRead = $billet->read($id_post);
                    $var_array = array("title" => $donneeBilletRead[0]->getTitre(),
                        "contenuBillet" => $donneeBilletRead[0]->getContenu(),
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

    public function validationMiseAJour($id_post){
        session_start();
        if(isset($_SESSION['pseudo'])){
            if (isset($id_post) && is_numeric($id_post)){

                if(isset($_POST['title']) && isset($_POST['content_post'])){
                    $billet = new PostDAO();
                    $billet->update($id_post);
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


    public function effacement($id_post){
        session_start();
        if (isset($_SESSION['pseudo'])){
            $billet = new PostDAO();
            $tab = $billet->returnLastPost();
//                var_dump($tab[0]->getId());
            if ($id_post !== $tab[0]->getId()){

                $billet->delete($id_post);
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

    public function commentaireAModerer(){
        session_start();
        if (isset($_SESSION['pseudo'])){
            $commentaire = new CommentDAO();
            $commentaireAModerer = $commentaire->commentReported();
            $var_array = array("moderateComment" => $commentaireAModerer

            );
            $this->viewTemplate('app/view/admin/moderation.php', 'app/view/admin/Template.php', 'Modération des Commentaires', $var_array);
        }
    }

    public function validationEditComment($id_comment){
        session_start();
        if(isset($_SESSION['pseudo'])){
            if (isset($id_comment) && is_numeric($id_comment)){
                $com = new CommentDAO();
                if ($com->readUnique($id_comment)){
                    if(isset($_POST['title']) && isset($_POST['content_com'])){
                        $commentaire = new CommentDAO();
                        $commentaire->update($id_comment);
                        var_dump($commentaire->update($id_comment));
                        header('Location: /app/admin/commentaireAModerer'); //renvoi au tableau de modération
                    }
                    else {
                        header('Location: /app/admin/home');//renvoi au tableau de moderation
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

    public function supprimerCommentaire ($id_comment)
    {
        session_start();
        if (isset($_SESSION['pseudo'])){
            $commentaire = new CommentDAO();
            $commentaire->delete($id_comment);
            header('Location: /app/admin/commentaireAModerer');
        }
        else {
            header ('Location: /app/admin/login');
        }

    }
}
