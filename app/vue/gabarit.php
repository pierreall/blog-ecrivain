<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>
<body>
<header class="">
    <nav class="navbar navbar-default">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#">Accueil</a></li>
                <li><a href="#">Dernier Billet</a></li>
                <li><a href="#">Connection</a></li>
            </ul>

    </nav>
<h1><?php echo $title; ?></h1>
</header>
<section class="container" style="color: red;">
<?php echo $contenu?>
</section>
 <footer>

</footer>
</body>
</html>