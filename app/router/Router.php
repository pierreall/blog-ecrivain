<?php
namespace App\Router;

use App\Controler\ErreurControler;
use App\Controler\BilletControler;
use App\Controler\CommentaireControler;
use App\Controler\UtilisateurControler;

class Router
{
    protected $controller;
    protected $method;



    public function __construct()
    {
        //put in an associative array the elements of url
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        //place in a string array the different elements delimited by '/' retrieve in $url
        $explose = explode('/', $url);


        /*takes each index of $ explose and checks if the element exists and if a value other than an empty chain is associated with it,
        if not, then a value is associated with the index.
        */
        if(!isset($explose[2])|| $explose[2] == ''){
            $this->controller = 'billet';
            $this->method = 'affichageAll';
            $this->param = '';
        }
        else{
            $this->controller = $explose[2];
            if(!isset($explose[3])|| $explose[3] == ''){
                $this->method = 'index';//default method for all controllers
                $this->param = '';
            }
            else {
                $this->method = $explose[3];

                if(!isset($explose[4]) || $explose[4] == ''){
                    $this->param = '';
                }
                else {
                    $this->param = $explose[4];
                }

            }
        }

        $className = 'App\Controler\\'.ucfirst($this->controller).'Controler';
        /**
        check if the class (the controller) $ className exists, if it exists create a new instance of this controller and then check
        if the passed method exists, apply it to the controller and add the passed parameter.
         */
        if (class_exists($className)){
            $this->controller = new $className();

            $method = $this->method;
            if(method_exists($this->controller, $method)){

                $this->controller->$method($this->param);

            }
            else {
                ErreurControler::methodNoExist();
            }
        }
        else {
            ErreurControler::methodNoExist();
        }

    }


}

