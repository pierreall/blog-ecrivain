<?php

namespace App\Model\DAO;

use App\Model\Model;

class CommentDAO extends Model
{



    public function create ($id_post)
    {
        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d H:i:s');
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content_com']);
        $author = htmlspecialchars($_POST['author']);

        $req = $this->getPDO()->prepare('INSERT INTO commentaire (date, titre, contenu, auteur, id_billet) VALUES (?, ?, ?, ?, ?)');
        return $req->execute(array($date, $title, $content, $author, $id_post));
    }
//get all comments related to a post
    public function read ($id_post)
    {
        $req = $this->getPDO()->prepare('SELECT * FROM commentaire WHERE id_billet = ?');
        $req->execute(array($id_post));
        $array = $req->fetchAll();/*\PDO::FETCH_OBJ*/
        $comments = array();
        foreach ($array as $object){
            $comment = new Comment($object);
            $comments []= $comment;
        }

        return $comments;
    }
//get a comment
    public function readUnique($id_comment){
        $req = $this->getPDO()->prepare('SELECT * FROM commentaire WHERE id_commentaire = ? ');
        $req->execute(array($id_comment));
        $array = $req->fetchAll();
        $comments = array();
        foreach ($array as $object){
            $comment = new Comment($object);
            $comments []= $comment;
        }
        return $comments;
    }


    public function update ($id_comment)
    {
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content_com']);

        $req = $this->getPDO()->prepare('UPDATE commentaire SET titre = ?, contenu = ?, moderation = FALSE WHERE id_commentaire = ?');
        $req->execute(array($title, $content, $id_comment));
    }

    public function delete ($id_comment)
    {
        $req = $this->getPDO()->prepare('DELETE FROM commentaire WHERE id_commentaire = ?');
        $req->execute(array($id_comment));
    }

    public function reportComment($id_comment){
        $req = $this->getPDO()->prepare('UPDATE commentaire SET moderation = TRUE  WHERE id_commentaire = ?');
        $req->execute(array($id_comment));
    }

    public function commentReported(){
        $req = $this->getPDO()->query('SELECT * FROM commentaire');
        $array = $req->fetchAll();/*\PDO::FETCH_OBJ*/
        $comments = array();
        foreach ($array as $object){
            $comment = new Comment($object);
            $comments []= $comment;
        }

        return $comments;

    }
    public function commentCounter($id_post){
        $req = $this->getPDO()->prepare('SELECT COUNT(*) FROM commentaire WHERE id_billet = ?');
        $req->execute(array($id_post));
        return $array = $req->fetch();
    }
}