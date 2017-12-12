<?php
namespace App\Controler;
class Controler {


//    public function index(){
//        $this->affichageAll();
//    }

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

    public function ajout(){

    }
    public function affichage($id_post){

    }
    public function miseAJour($id_post){

    }
    public function supprimer(){

    }

}
