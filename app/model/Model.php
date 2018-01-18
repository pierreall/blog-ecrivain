<?php
namespace App\Model;


use App\Config\Config;
use App\Controler\BilletControler;
use App\Controler\ErreurControler;


class Model extends Config
{
    /**
     * @var \PDO
     * se connecter à la base de donné
     */
    protected $pdo;

    /*public function __construct(){
        try
        {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=blog-ecrivain', 'root', '');
        }
        catch (\Exception $e)
        {
            die ('Erreur :'.$e->getMessage());
        }
    }


        public function getPDO(){
            return $this->pdo;
        }*/
    public static $hostname;
    public static $dbname;
    public static $user;
    public static $pswd;


    public function __construct(){
        try
        {
            $this->pdo = new \PDO('mysql:host='.self::$hostname.';dbname='.  self::$dbname.'', ''.self::$user.'', ''. self::$pswd.'');
        }
        catch (\Exception $e)
        {
            die ('Erreur :'.$e->getMessage());
        }
    }



    public function getPDO(){
        return $this->pdo;
    }
}

/*Model::$hostname = 'localhost';
Model::$dbname = 'blog-ecrivain';
Model::$user = 'root';
Model::$pswd = '';*/

