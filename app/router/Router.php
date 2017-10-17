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
if($explose[2] == null || $explose[2] == ''){
    $this->controller = 'billet';
    $this->method = 'affichage';
    $this->param = 0;
}
else{
    $this->controller = $explose[2];
    if($explose[3] == null || $explose[3] == ''){
        $this->method = 'affichage';
        $this->param = 0;
    }
    else {
        $this->method = $explose[3];
        if($explose[4] == null || $explose[4] == ''){
            $this->param = 0;
        }
        else {
            $this->param = $explose[4];
        }

    }
}


        $className = 'App\Controler\\'.ucfirst($this->controller).'Controler';

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

