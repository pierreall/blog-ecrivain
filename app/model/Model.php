<?php
namespace App\Model;

use App\Config;

class Model
{
    /**
     * connect to the database
     * the variables must be modified with the file config.php
     */
    protected $pdo;

    public static $hostname;
    public static $dbname;
    public static $user;
    public static $pswd;


    public function __construct(){
        try
        {
            Config::config_db();
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

