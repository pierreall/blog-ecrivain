<?php
namespace App\Controler;


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
        $this->viewTemplate('app/view/admin/login.php', 'app/view/admin/Template.php', 'Connection administration');
    }



    public function home(){
        session_start();
        if(isset($_SESSION['pseudo'])) {
            $this->viewTemplate('app/view/admin/Welcome.php', 'app/view/admin/Template.php', 'Accueil Administration');
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
            $user->verif();


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


}
