<?php
namespace App\Model\DAO;
class Post {
    private $_id_post;
    private $_date;
    private $_title;
    private $_content;
    private $_author;


    public function __construct ($objet)
    {
        $this->hydrate($objet);
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function setId_billet($id_post){
        $this->_id_post = $id_post;
    }

    public function setDate ($date)
    {
        $date = new \DateTime($date);
        $date = $date->format('d-m-Y'.' à '.'H:i:s');
        $this->_date = $date;
    }


    public function setTitre ($title)
    {
        $this->_title = $title;
    }


    public function setContenu ($content)
    {
        $this->_content = $content;
    }


    public function setAuteur ($author)
    {
        $this->_author = $author;
    }

//getters
    public function getId ()
    {
        return $this->_id_post;
    }


    public function getDate ()
    {
        return $this->_date;
    }


    public function getTitre ()
    {
        return $this->_title;
    }


    public function getContenu ()
    {
        return $this->_content;
    }


    public function getAuteur ()
    {
        return $this->_author;
    }


}

