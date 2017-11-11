<?php

session_start();

if(isset($_POST['pseudo']) && isset($_POST['password'])){

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = htmlspecialchars($_POST['password']);


    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog-ecrivain', 'root', '');
    }
    catch (Exception $e)
    {
        die ('Erreur :'.$e->getMessage());
    }

    $req = $bdd->prepare('SELECT pseudo, password FROM utilisateurs WHERE pseudo = :pseudo');
    $req->execute(array('pseudo' => $pseudo));
    $row = $req->fetchAll();
    if (!empty($row)) {
        $isOk = password_verify($mdp, $row[0]['password']);

        if ($isOk) {
            $_SESSION['pseudo'] = $row[0]['pseudo'];
            header('Location: welcome.php');
        } else {
            echo "verifiez vos données";
            header('Location: connection.php');
            die();
        }
    } else {
        echo "cet utilisateur n'existe pas.";
        header('Location; connection.php');
    }


} else {
    header('Location: connection.php');
}

