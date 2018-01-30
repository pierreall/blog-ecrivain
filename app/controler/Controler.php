<?php
namespace App\Controler;
/**
  * mother class for each controller
 */

class Controler {

//generates from the data recovered by the model the view and displays it in a template
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

