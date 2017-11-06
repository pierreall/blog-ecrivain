<?php

namespace App\Model\DAO;

use App\Model\Model;

class BilletDAO extends Model implements DAO
{

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
//      return $req->fetch();
        $array = $req->fetchAll();
//        die(var_dump($array));
        $billets = array();
        foreach ($array as $objet){
            $billet = new Billet($objet);
//            var_dump($billet);
//            die('salut');
            $billets[] = $billet;
        }
        return $billets;
    }

    public function readAll ()
    {
       $req = $this->getPDO()->query('SELECT * FROM billet');
       $array = $req->fetchAll();/*\PDO::FETCH_OBJ*/
       $billets = array();
       foreach ($array as $objet){
           $billet = new Billet($objet);
           $billets []= $billet;
       }
        return $billets;
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

