<?php

namespace App\Model\DAO;

use App\Model\Model;

class PostDAO extends Model
{

//methods
    public function create ()
    {
        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d H:i:s');
        $title = htmlspecialchars($_POST['title']);
        $content = $_POST['content_post'];
        $author = $_SESSION['pseudo'];

        $req = $this->getPDO()->prepare('INSERT INTO billet (date, titre, contenu, auteur) VALUES (?, ?, ?, ?)');
        return $req->execute(array($date, $title, $content, $author));

    }
//get a post
    public function read ($id_post)
    {
        $req = $this->getPDO()->prepare('SELECT * FROM billet WHERE id_billet = ?');
       $req->execute(array($id_post));

        $array = $req->fetchAll();

        $posts = array();
        foreach ($array as $object){
            $post = new Post($object);

            $posts[] = $post;
        }
        return $posts;
    }
//get all posts
    public function readAll ()
    {
       $req = $this->getPDO()->query('SELECT * FROM billet');
       $array = $req->fetchAll();/*\PDO::FETCH_OBJ*/
       $posts = array();
       foreach ($array as $object){
           $post = new Post($object);
           $posts []= $post;
       }
        return $posts;
    }

     public function update ($post_id)
    {
        $title = htmlspecialchars($_POST['title']);
        $content = $_POST['content_post'];

        $req = $this->getPDO()->prepare('UPDATE billet SET titre = ?, contenu = ?  WHERE id_billet = ?');
        $req->execute(array($title, $content, $post_id));
    }

    public function delete ($post_id)
    {
        $req = $this->getPDO()->prepare('DELETE FROM billet WHERE id_billet = ?');
        $req->execute(array($post_id));

    }

    public function returnLastPost(){
        $req = $this->getPDO()->query('SELECT * FROM billet ORDER BY id_billet DESC LIMIT 1');
        $array = $req->fetchAll();
        $posts = array();
        foreach ($array as $object){
            $post = new Post($object);
            $posts [] = $post;
        }
        return $posts;

    }

}

