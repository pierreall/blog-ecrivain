<?php
use App\Autoloader;
use App\Router\Router;
//use App\Model\Model;
use App\Controler\BilletControler;
//require_once "model/Model.php";
//require "router/Router.php";
//require 'controler/BilletControler.php';
//require 'controler/CommentaireControler.php';
//require 'controler/UtilisateurControler.php';
//require 'controler/ErreurControler.php';

 require 'App/Autoloader.php';

 Autoloader::register();

$routeur = new Router();
//$model = new Model();

//$controler = $routeur->getController();
//var_dump($controler);
//$method = $routeur->getMethod().'()';
//var_dump($method);
//$controler->$method;


//echo 'le controler est : ' .$routeur->getController() . ' ';
//echo 'la méthode est : '. $routeur->getMethod();