<?php
namespace App\Model\DAO;
class Comment {
    private $_id_commentaire;
    private $_date;
    private $_titre;
    private $_contenu;
    private $_auteur;
    private $_id_billet;
    private $_moderation;


    public function __construct ($objet)
    {
//        var_dump($objet);
        $this->hydrate($objet);
//        echo 'test : '.$this->getTitre();
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function setId_commentaire ($id_commentaire){
        $this->_id_commentaire = $id_commentaire;
    }

    public function setDate ($date)
    {
        $this->_date = $date;
    }


    public function setTitre ($titre)
    {
        $this->_titre = $titre;
    }


    public function setContenu ($contenu)
    {
        $this->_contenu = $contenu;
    }


    public function setAuteur ($auteur)
    {
        $this->_auteur = $auteur;
    }

    public function setId_billet($id_billet){
        $this->_id_billet = $id_billet;
    }

    public function setModeration($moderation){
        $this->_moderation = $moderation;
    }

//getters
    public function getId ()
    {
        return $this->_id_commentaire;
    }


    public function getDate ()
    {
        return $this->_date;
    }


    public function getTitre ()
    {
        return $this->_titre;
    }


    public function getContenu ()
    {
        return $this->_contenu;
    }


    public function getAuteur ()
    {
        return $this->_auteur;
    }

    public function getIdBillet(){
        return $this->_id_billet;
    }

    public function getModeration(){
        return $this->_moderation;
    }
}