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
            $this->method = 'affichageAll';
            $this->param = '';
        }
        else{
            $this->controller = $explose[2];
            if(!isset($explose[3])|| $explose[3] == ''){
                $this->method = 'affichageAll';
                $this->param = '';
            }
            else {
                $this->method = $explose[3];

                if(!array_key_exists('4', $explose) || $explose[4] == ''){
                    $this->param = '';
                }
                else {
                    $this->param = $explose[4];
                }

            }
        }


        $className = 'App\Controler\\'.ucfirst($this->controller).'Controler';

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

