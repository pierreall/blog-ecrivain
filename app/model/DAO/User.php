<?php
namespace App\Model\DAO;
class User {
    protected $utilisateur;

    private $_id;
    private $_nom;
    private $_pseudo;
    private $_email;

    public function __construct ($objet)
    {
        $this->hydrate($objet);
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
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


}