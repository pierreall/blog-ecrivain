<?php
namespace App;
class Autoloader {
/*    static function registerControler(){
        spl_autoload_register([__CLASS__, 'autoloadControler']);
    }

    static function registerModel(){
        spl_autoload_register([__CLASS__, 'autoloadModel']);
    }
    static function registerVue(){
        spl_autoload_register([__CLASS__, 'autoloadVue']);
    }

    static function autoloadControler($class_name){
        require 'controler/'.$class_name.'php';
    }

    static function autoloadModel($class_name){
        require 'model/DAO/'.$class_name.'php';
    }

    static function autoloadVue($class_name){
        require 'vue/'.$class_name.'php';
    }*/


/*spl_autoload_register(function ($className) {


    $ds = DIRECTORY_SEPARATOR;
    $dir = __DIR__;


    $className = str_replace('\\', $ds, $className);

       $file = "{$dir}{$ds}{$className}.php";

    if (is_readable($file)) require_once $file;
});*/




 static function register(){
     spl_autoload_extensions('.php');
       spl_autoload_register();
    }
//spl_autoload_register([__CLASS__, 'autoload']);
    /*static function autoload($class_name){
//       require( __DIR__ . DIRECTORY_SEPARATOR. $class_name . '.php');
        echo 'classe_name ='.$class_name . '<br>';
//
        echo 'namespace='.__NAMESPACE__;

//      require(__NAMESPACE__.$class_name.'.php');
        require $class_name. '.php';

  }*/




}