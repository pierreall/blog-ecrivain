<?php
namespace App\Controler;

class AdminControler
{
    public function __construct ()
    {
       require_once 'app/admin/connection.php';
    }
}

/*//connection.php


echo '<form action="verif.php" method ="post">';
echo '<input type ="text" name ="pseudo">';
echo '<input type="password" name="password">';
echo '<input type = "submit" value="se connecter">';*/



//verif.php
//session_start();

/*if (verification du mot de passe et du pseudo) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $_SESSION['pseudo'] = $pseudo;
    affiche page de bienvenue.php
} else {
    renvoi vers connection.php
}

// bienvenue.php
*/
//session_start();
//if($pseudo) {
//    // rien
//}
//else {
//    renvoi vers connection.php
//}
// if*/
//*/
