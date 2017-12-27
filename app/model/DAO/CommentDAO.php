<?php

namespace App\Model\DAO;

use App\Model\Model;

class CommentDAO extends Model
{

   

//methods
    public function create ($id_post)
    {
        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d H:i:s');
        $titre = htmlspecialchars($_POST['title']);
        $contenu = htmlspecialchars($_POST['content_com']);
        $auteur = htmlspecialchars($_POST['author']);

        $req = $this->getPDO()->prepare('INSERT INTO commentaire (date, titre, contenu, auteur, id_billet) VALUES (?, ?, ?, ?, ?)');
        return $req->execute(array($date, $titre, $contenu, $auteur, $id_post));
    }

    public function read ($id_post)
    {
        $req = $this->getPDO()->prepare('SELECT * FROM commentaire WHERE id_billet = ?');
        $req->execute(array($id_post));
        $array = $req->fetchAll();/*\PDO::FETCH_OBJ*/
        $commentaires = array();
        foreach ($array as $objet){
            $commentaire = new Comment($objet);
            $commentaires []= $commentaire;
        }
        return $commentaires;
    }

    public function update ()
    {

    }

    public function delete ()
    {

    }
}