<?php
namespace App\Config;

use App\Model\Model;
class Config {
    /*Configuration de l'accés pdo en bdd*/
public static function config ()
{
    Model::$hostname = 'localhost';
    Model::$dbname = 'blog-ecrivain';
    Model::$user = 'root';
    Model::$pswd = '';
}

}






