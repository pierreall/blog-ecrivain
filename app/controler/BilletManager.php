<?php
namespace App\Controler;

class BilletManager extends DAO
{
    private getPDO();
    
    
    
    
    public function __construct($this->getPDO()){
        $this->setPDo(getPDO());
    }
    
    
   public function setPDO($PDO){
       $this->getPDO() = $PDO;
   }
    
 
    public function create ()
    {
//        $titre = htmlspecialchars($_POST['titre']);
//        $contenu = htmlspecialchars($_POST['contenu']);
//        $auteur = htmlspecialchars($_POST['auteur']);


        $req = $this->getPDO()->prepare('INSERT INTO billet (titre, contenu, auteur ) VALUES (?, ?, ?)');
        return $req->execute(array($titre, $contenu,$auteur));

    }

    public function read ($id_post)
    {
        $req = $this->getPDO()->prepare('SELECT * FROM billet WHERE id_billet = ?');
       $req->execute(array($id_post));
      return $req->fetch();
    }

    public function readAll ()
    {
       $req = $this->getPDO()->query('SELECT * FROM billet');
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

    public function update ()
    {
        $req = $this->getPDO()->prepare('UPDATE billet SET ? = ? WHERE id_billet = ?');
        $req->execute(array($column, $value, $this->getId()));
    }

    public function delete ()
    {
        $req = $this->getPDO()->query('DELETE FROM billet WHERE id_billet = ?');
        $req->execute(array($this->getId()));

    }

}