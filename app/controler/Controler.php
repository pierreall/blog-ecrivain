<?php

class Controler {




    /**
     * @param $url_view string
     * @param $url_template string
     * @param $title string
     */
    public function viewTemplate( $url_view, $url_template, $title){
        ob_start();
        require $url_view;
        $contenu = ob_get_contents();
        ob_end_clean();
        $title = $title;
        require $url_template;
    }
}
