<?php

namespace App\Model\DAO;

use App\Model\Model;

class PostDAO extends Model
{

//methods
    public function create ()
    {
//        $titre = htmlspecialchars($_POST['title']);
//        $contenu = htmlspecialchars($_POST['content_post']);
        $titre = $_POST['title'];
        $contenu = $_POST['content_post'];
        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d H:i:s');
//        $auteur = $_SESSION['pseudo'];
        $auteur = 'Pierre';
        var_dump($auteur);

//        $auteur = htmlspecialchars($_POST['auteur']);


        $req = $this->getPDO()->prepare('INSERT INTO billet (date, titre, contenu, auteur) VALUES (?, ?, ?, ?)');
        return $req->execute(array($date, $titre, $contenu, $auteur));

    }

    public function read ($id_post)
    {
        $req = $this->getPDO()->prepare('SELECT * FROM billet WHERE id_billet = ?');
       $req->execute(array($id_post));
//       var_dump($req);
//      return $req->fetch();
        $array = $req->fetchAll();
//        die(var_dump($array));
        $billets = array();
        foreach ($array as $objet){
            $billet = new Post($objet);
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
           $billet = new Post($objet);
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

