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


    /**
     * Router constructor.
     */
    public function __construct()
    {
        //place dans un tableau associatif les éléments formant l'url
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        //place dans un tableau de string les différents éléments délimiter par '/' récupérer dans $url
        $explose = explode('/', $url);

        //remplace les 2 premier élément de $explose par un champs vide
        str_replace('$explose[0]', '','$explose');
        str_replace('$explose[1]','','$explose');

        $explose[0] == '';
        $explose[1] == '';

/*reprent chaque index de $explose et verifie si l'élément existe bien et si une valeur autre qu'une chaine vide  lui est associé,
si ce n'est pas le cas une valeur est alors associé à l'index. sauf pour les paramétre de méthod ou si aucun
*/
        if(!isset($explose[2])|| $explose[2] == ''){
            $this->controller = 'billet';
            $this->method = 'affichageAll';
            $this->param = '';
        }
        else{
            $this->controller = $explose[2];
            if(!isset($explose[3])|| $explose[3] == ''){
                $this->method = 'index';//methode par défaut pour tous les controlers
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
         * verifie si la classe(le controleur) $className existe, si elle existe créer une nouvel instance de ce controleur et vérifie ensuite
         * si la méthode passé existe , si existe l'applique au controleur et ajoute le paramètre passé.
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
//            $this->controller = new ErreurControler();
            ErreurControler::methodNoExist();
        }

    }

    public function getController(){
        return $this->controller;
    }

    public function getMethod(){
        return $this->method;
    }

}

