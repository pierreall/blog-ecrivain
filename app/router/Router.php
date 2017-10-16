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

        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        var_dump($url);



        $explose = explode('/', $url);
        var_dump($explose);
        // $this->controller = $explose[1];
        str_replace('$explose[0]', '','$explose');
        str_replace('$explose[1]','','$explose');

        $explose[0] == '';
        $explose[1] == '';

        $this->controller = $explose[2];
        $this->method = $explose[3];
        $this->param = $explose[4];

        $className = 'App\Controler\\'.ucfirst($explose[2]).'Controler';

        if (class_exists($className)){
            $this->controller = new $className();
//            $this->controller->{$this->method .'()'};
//            call_user_func($this->method, 1);
//            $this->controller->affichage(1);

            $method = $this->method;
            if(method_exists($this->controller, $method)){

                $this->controller->$method($this->param);


            }
            else {
                ErreurControler::methodNoExist();
            }
        }
        else {
            $this->controller = new ErreurControler();
        }

    }

    public function getController(){
        return $this->controller;
    }

    public function getMethod(){
        return $this->method;
    }

}

