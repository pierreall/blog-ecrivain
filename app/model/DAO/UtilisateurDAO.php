<?php

namespace App\Model\DAO;

use App\Model\Model;

class UtilisateurDAO extends Model
{
    protected $utilisateur;

    private $_id;
    private $_nom;
    private $_pseudo;
    private $_email;

    public function __construct ()
    {

    }


//setters
    public function setId ($id)
    {
        $this->_id = $id;
    }


    public function setNom ($nom)
    {
        $this->_nom = $nom;
    }


    public function setPseudo ($pseudo)
    {
        $this->_pseudo = $pseudo;
    }


    public function setEmail ($email)
    {
        $this->_email = $email;
    }


    //getters


    public function getId ()
    {
        return $this->_id;
    }


    public function getNom ()
    {
        return $this->_nom;
    }


    public function getPseudo ()
    {
        return $this->_pseudo;
    }

    public function getEmail ()
    {
        return $this->_email;
    }




    /*    public $request = getPDO()->query('SELECT id, nom, pseudo, email FROM utilisateur');


    while ($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            $utilisateur = new Utilisateur($donnees);
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