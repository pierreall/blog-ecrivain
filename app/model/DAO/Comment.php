<?php
namespace App\Model\DAO;
class Comment {
    private $_id_comment;
    private $_date;
    private $_title;
    private $_content;
    private $_author;
    private $_id_post;
    private $_moderation;


    public function __construct ($object)
    {
        $this->hydrate($object);
    }

    public function hydrate(array $datas){
        foreach ($datas as $key => $value){
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function setId_commentaire ($id_comment){
        $this->_id_comment = $id_comment;
    }

    public function setDate ($date)
    {
        $date = new \DateTime($date);
        $date = $date->format('d-m-Y'.' à '.'H:i:s'); //modification of the date recorded in database in french version
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

    public function setId_billet($id_post){
        $this->_id_post = $id_post;
    }

    public function setModeration($moderation){
        $this->_moderation = $moderation;
    }

//getters
    public function getId ()
    {
        return $this->_id_comment;
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

    public function getIdBillet(){
        return $this->_id_post;
    }

    public function getModeration(){
        return $this->_moderation;
    }
}