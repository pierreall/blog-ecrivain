<?php
namespace App\Controler;


use App\Model\DAO\CommentDAO;
use App\Model\DAO\PostDAO;
use App\Model\DAO\UserDAO;


class AdminControler extends Controler
{
    /**
     * @var
     */
    private $admin;

    /**
     * AdminControler constructor.
     */
    public function __construct ()
    {

    }
// méthode appelé par default
    public function index(){
        if(isset($_SESSION['pseudo'])){
            header('Location: /app/admin/home');
        }
        else {
            header('Location: /app/admin/login');

        }
    }

//connexion à la zone admin
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
    //déconnexion de la zone admin
    public function logout(){
        session_start();
        session_destroy();
        header('Location: /');

    }



    public function home(){
        session_start();
        if(isset($_SESSION['pseudo'])) {
            $post = new PostDAO();
            $donneeBilletAll = $post->readAll();
            $var_array = array("donneeBillet" => $donneeBilletAll);
            $this->viewTemplate('app/view/admin/Welcome.php', 'app/view/admin/Template.php', 'Accueil Administration', $var_array);
        }
        else {
            header('Location: /app/admin/login');
        }

    }

    //verifie si les identifiants de connexion de la zone admin correspondent à ceux enregistré en base de données
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
    //ajoute un nouveau billet au blog
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
//mise à jour d'un billet du blog : récupère le contenu du billet et l'affiche dans une interface WYSIWYW
    public function miseAJour($id_post)
    {
        session_start();
        if (isset($_SESSION['pseudo'])){
            if (isset($id_post) && is_numeric($id_post)) {
                $post = new PostDAO();
                if ($post->read($id_post)) {
                    $donneeBilletRead = $post->read($id_post);
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
//mise à jour d'un billet du blog : enregistre en bd le changement effectué sur le billet.
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

//supprimer un billet de blog
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
    //method appelé quand un utilisateur signal un commentaire
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

    //récupère l'ensemble des commentaires et les affiches en zone admin en vue de leur éventuel modérations
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

    // met à jour en base de données les commentaires modérés
    public function validationEditComment($id_comment){
        session_start();
        if(isset($_SESSION['pseudo'])){
            if (isset($id_comment) && is_numeric($id_comment)){
                $com = new CommentDAO();
                if ($com->readUnique($id_comment)){
                    if(isset($_POST['title']) && isset($_POST['content_com'])){
                        $comment = new CommentDAO();
                        $comment->update($id_comment);
                        var_dump($comment->update($id_comment));
                        header('Location: /app/admin/commentaireAModerer'); //renvoi au tableau de modération
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
//supprime un commentaires de la base de données
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
