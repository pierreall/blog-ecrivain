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
//        var_dump($commentaire->getId());
        return $commentaires;
    }

    public function readUnique($id_comment){
        $req = $this->getPDO()->prepare('SELECT * FROM commentaire WHERE id_commentaire = ? ');
        $req->execute(array($id_comment));
        $array = $req->fetchAll();
        $commentaires = array();
        foreach ($array as $objet){
            $commentaire = new Comment($objet);
            $commentaires []= $commentaire;
        }
        return $commentaires;
    }

    public function reportComment($id_comment){
        $req = $this->getPDO()->prepare('UPDATE commentaire SET moderation = TRUE  WHERE id_commentaire = ?');
        $req->execute(array($id_comment));
    }

    public function commentReported(){
        $req = $this->getPDO()->query('SELECT * FROM commentaire');
        $array = $req->fetchAll();/*\PDO::FETCH_OBJ*/
        $commentaires = array();
        foreach ($array as $objet){
            $commentaire = new Comment($objet);
            $commentaires []= $commentaire;
        }
//        var_dump($commentaire->getId());
        return $commentaires;

    }
    public function commentCounter($id_post){
        $req = $this->getPDO()->prepare('SELECT COUNT(*) FROM commentaire WHERE id_billet = ?');
         $req->execute(array($id_post));
        return $array = $req->fetch();
    }

    public function update ($id_comment)
    {
        $titre = htmlspecialchars($_POST['title']);
        $contenu = htmlspecialchars($_POST['content_com']);

        $req = $this->getPDO()->prepare('UPDATE commentaire SET titre = ?, contenu = ?, moderation = FALSE WHERE id_commentaire = ?');
        $req->execute(array($titre, $contenu, $id_comment));
    }

    public function delete ($id_comment)
    {
        $req = $this->getPDO()->prepare('DELETE FROM commentaire WHERE id_commentaire = ?');
        $req->execute(array($id_comment));
    }
}