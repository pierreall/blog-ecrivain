<?php

namespace App\Model\DAO;

use App\Model\Model;

class BilletDAO extends Model implements DAO
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
        $req = getPDO()->prepare('INSERT INTO billet (dateBillet, titre, contenu, auteur ) VALUES (?, ?, ?, ?)');
        return $req->execute(array($date, $titre, $contenu,$auteur));

    }

    public function read ()
    {
        $req = getPDO()->query('SELECT * FROM billet WHERE id = $this->_id');
    }

    public function update ()
    {
        $req = getPDO()->prepare('UPDATE billet SET ? = ? WHERE id = $this->_id');
        $req->execute(array($column, $value));
    }

    public function delete ()
    {
        $req = getPDO()->query('DELETE FROM billet WHERE id = $this->_id');

    }
}
