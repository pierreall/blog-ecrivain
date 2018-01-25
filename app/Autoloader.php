<?php
namespace App;
class Autoloader {

 static function register(){
     spl_autoload_extensions('.php');
       spl_autoload_register();
    }

}