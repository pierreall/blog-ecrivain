<?php
namespace App\Controler;
/**
 * Class Controler
 * @package App\Controler
 * class mère appelé dans chaque controler
 */

class Controler {


//    public function index(){
//        $this->affichageAll();
//    }

//génère à partir des donné récupérer par le model la vue et l'affiche dans un template
     public function viewTemplate( $url_view, $url_template, $title, $array = null){
        if(isset($array)){
            extract($array);
        }
         ob_start();
        require $url_view;
        $contenu = ob_get_contents();
        ob_end_clean();
        $title = $title;
        require $url_template;
    }

}
