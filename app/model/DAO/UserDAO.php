<?php

namespace App\Model\DAO;

use App\Model\Model;

class UserDAO extends Model
{
    protected $utilisateur;


    /*    public $request = getPDO()->query('SELECT id, nom, pseudo, email FROM utilisateur');


    while ($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            $utilisateur = new User($donnees);
        }

        public function hydrate(array $donnees){
            if (isset($donnees['id'])){
                $this->setId($donnees['id']);
            }

            if (isset($donnees['nom'])){
                $this->setNom($donnees['nom']);
            }

            if (isset($donnees['pseudo'])) {
                $this->setPseudo($donnees['pseudo']);
            }

            if(isset($donnees['email'])){
                $this->setEmail($donnees['email']);
            }
        }*/
    public function verif(){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = htmlspecialchars($_POST['password']);

        $req = $this->getPDO()->prepare('SELECT pseudo, password FROM user WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        return $row = $req->fetchAll();
    }


    public function create ()
    {

    }

    public function read ()
    {

    }

    public function update ()
    {

    }

    public function delete ()
    {

    }
}