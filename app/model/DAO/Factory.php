<?php
namespace App\Model\DAO;

class Factory
{

    public static function newBillet(){
        return new PostDAO();
    }

    public static function newCommentaire(){
        return new CommentDAO();
    }

    public static function newUtilisateur(){
        return new UserDAO();
    }
}
