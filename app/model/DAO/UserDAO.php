<?php

namespace App\Model\DAO;

use App\Model\Model;

class UserDAO extends Model
{


    public function verif(){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = htmlspecialchars($_POST['password']);

        $req = $this->getPDO()->prepare('SELECT pseudo, password FROM user WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));

       return $row = $req->fetchAll();
    }


}