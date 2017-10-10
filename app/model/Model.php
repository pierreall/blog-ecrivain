<?php
namespace App\Model;

class Model
{
   protected $pdo;

public function __construct(){
    try
    {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=testcourphp', 'root', '');
    }
    catch (Exception $e)
    {
        die ('Erreur :'.$e->getMessage());
    }
}


    public function getPDO(){
        return $this->pdo;
    }


}
