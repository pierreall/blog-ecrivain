<?php
namespace App\Model\DAO;

class Factory
{

    public static function newBillet(){
        return new BilletDAO();
    }

    public static function newCommentaire(){
        return new CommentaireDAO();
    }

    public static function newUtilisateur(){
        return new UtilisateurDAO();
    }
}
