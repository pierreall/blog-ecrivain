<?php

namespace App\Model\DAO;

use App\Model\Model;

class CommentaireDAO extends Model
{

    private $_id;
    private $_date;
    private $_titre;
    private $_contenu;
    private $_auteur;


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

//getters
    public function getId ()
    {
        return $this->_id;
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

//methods
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