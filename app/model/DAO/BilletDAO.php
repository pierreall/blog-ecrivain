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
//        $titre = htmlspecialchars($_POST['titre']);
//        $contenu = htmlspecialchars($_POST['contenu']);
//        $auteur = htmlspecialchars($_POST['auteur']);


        $req = $this->getPDO()->prepare('INSERT INTO billet (titre, contenu, auteur ) VALUES (?, ?, ?)');
        return $req->execute(array($titre, $contenu,$auteur));

    }

    public function read ($id_post)
    {
        $req = $this->getPDO()->prepare('SELECT * FROM billet WHERE id_billet = ?');
       $req->execute(array($id_post));
      return $req->fetch();
    }

    public function readAll ()
    {
        return $this->getPDO()->query('SELECT * FROM billet');
//        return $req->fetch();
    }

    public function update ()
    {
        $req = $this->getPDO()->prepare('UPDATE billet SET ? = ? WHERE id_billet = ?');
        $req->execute(array($column, $value, $this->getId()));
    }

    public function delete ()
    {
        $req = $this->getPDO()->query('DELETE FROM billet WHERE id_billet = ?');
        $req->execute(array($this->getId()));

    }

}

