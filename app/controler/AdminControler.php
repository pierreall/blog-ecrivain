<?php
namespace App\Controler;


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
            //todo envoyer vers page d'accueil zone admin
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
        var_dump($_SESSION);
        if(isset($_SESSION['pseudo'])) {
            $billet = new PostDAO();
            $donneeBilletAll = $billet->readAll();
            $var_array = array("donneeBillet" => $donneeBilletAll);
            var_dump($var_array);
//                $this->viewTemplate('app/view/BilletAffichageAllVue.php','app/view/index.html', 'Bienvenue', $var_array);
            $this->viewTemplate('app/view/admin/Welcome.php', 'app/view/admin/Template.php', 'Accueil Administration', $var_array);
        }
        else {
            header('Location: /app/admin/login');
        }

    }

    public function verif(){

        session_start();

        if(isset($_POST['pseudo']) && isset($_POST['password'])){
            var_dump($_POST['pseudo']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mdp = htmlspecialchars($_POST['password']);

            $user = new UserDAO();
            $row = $user->verif();

            var_dump($row);

            if (!empty($row)) {

                $isOk = password_verify($mdp, $row[0]['password']);

                if ($isOk) {
                    $_SESSION['pseudo'] = $row[0]['pseudo'];
                    var_dump($_SESSION['pseudo']);
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
        var_dump($_SESSION);
        if (isset($_SESSION['pseudo'])){
            $this->viewTemplate('app/view/admin/addPostView.php','app/view/admin/Template.php', 'Ajout d\'un nouveau Billet');
            var_dump($_POST);
            if(isset($_POST['title']) && isset($_POST['content_post'])){
                $billet = new PostDAO();
                $billet->create();
                var_dump('test create');
            }
        }
        else {
            header('Location: /app/admin/login');
        }
    }
//    public function miseAJour($id_post){
//        session_start();
//        if(isset($_SESSION['pseudo'])){
//            $this->viewTemplate('app/view/admin/updatePostView.php','app/view/admin/Template.php', 'Mise à jour du billet'.$id_post);
////            var_dump('test'); die();
//            if(isset($_POST['title']) && isset($_POST['content_post'])){
//                $billet = new PostDAO();
//                $billet->update();
//            }
//        }
//        else {
//            header('Location: /app/admin/login');
//        }
//
//    }
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

//    public function miseAJour($id_post)
//    {var_dump('1er');
//        if (isset($id_post) && is_numeric($id_post)) {
//            var_dump('2em');
//            $billet = new PostDAO();
//            var_dump($billet);
//            var_dump('3em');
//            $donneeBilletRead = $billet->update();
//            var_dump($donneeBilletRead);
//            $var_array = array("titreBillet" => $donneeBilletRead[0]->getTitre(),
//                "contenuBillet" => $donneeBilletRead[0]->getContenu(),
//                "idBillet" => $donneeBilletRead[0]->getId());
//            $this->viewTemplate('app/view/admin/updatePostView.php', 'app/view/admin/Template.php', $var_array, $var_array);
//            $billet->update();
//        } else {
//            ErreurControler::methodNoExist();
//        }
//    }


    public function effacement($id_post){
        session_start();
        if (isset($_SESSION['pseudo'])){
            $billet = new PostDAO();
            $tab = $billet->returnLastPost();
//                var_dump($tab[0]->getId());
            if ($id_post !== $tab[0]->getId()){
//                $var_array = array("id_post" => $id_post);
//                $this->viewTemplate('app/view/admin/deletePostView.php', 'app/view/admin/Template.php', 'suppression de', $var_array);
//                if (isset($_POST['suppr']) && $_POST['suppr'] == "oui"){

                $billet->delete($id_post);
                header('Location: /app/admin/home');
//                }
//                else {
//                    header('Location: /app/admin/home');
//                }
            }
            else {
                header('Location: /app/admin/home/?suppr=interdit');
            }

        }
        else {
            header('Location: /app/admin/login');
        }
    }

    public function editionCommentaire($id_commentaire){

    }

    public function supprimerCommentaire ($id_commentaire)
    {

    }


//    public function validationEffacement($id_post){
//        if (isset($_SESSION['pseudo'])){
//            if (isset($id_post) && is_numeric($id_post)){
//                if (isset($_POST['suppr']) && $_POST['suppr'] == "oui" ){
//                    $billet = new PostDAO();
//                    $billet->delete($id_post);
//                    header('Location: /app/admin/home');
//                }
//                else {
//                    header('Location: /app/admin/home');
//                }
//            }else {
//                header('Location: /app/admin/home');
//            }
//        } else {
//            header('Location: /app/admin/login');
//        }
//    }
//    public function validationEffacement(){
//        if ($_POST['suppr'] = "oui"){
//            $billet = new PostDAO();
//            $billet->delete($id_)
//        }
//    }

    /*public function modification($url_view, $title, $type_modif){
        session_start();
        if (isset($_SESSION)){
            $this->viewTemplate($url_view, 'app/view/admin/Template.php', $title);
            $billet = new PostDAO();
            $billet->$type_modif;
        }
        else {
            header('Location: /app/admin/login');
        }
    }*/

}
