<?php
namespace App;

use App\Model\Model;
class Config
{
    // Configuration of database access by pdo
    public static function config_db ()
    {
        Model::$hostname = 'localhost';
        Model::$dbname = 'blog-ecrivain';
        Model::$user = 'root';
        Model::$pswd = '';
    }
}






