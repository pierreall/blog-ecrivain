<!--template page d'accueil du blog-->
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?= $title ?></title>

  <!-- Bootstrap core CSS -->
  <link href="/app/view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="/app/view/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="/app/view/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="index.php">Billet simple pour l'Alaska</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/app/billet/affichage_dernier_billet">Dernier Billet</a>
        </li>
          <?php
          if(isset($_SESSION['pseudo'])) {
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="/app/admin/">Admin</a>';
              echo '</li>';
          } else {
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="/app/admin/login">Connexion</a>';
              echo '</li>';
          }
          ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Page Header -->
<header class="masthead" style="background-image: url('/app/view/img/red_plane.png')">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Billet simple pour l'Alaska</h1>
          <span class="subheading"><?= $title ?></span>
        </div>
      </div>
    </div>
  </div>
</header>
<?= $content ?>

<!-- Pager -->
<div class="clearfix">
  <a class="btn btn-secondary float-right" href="/app/billet/affichage_dernier_billet">Dernier Billets &rarr;</a>
</div>


<hr>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <ul class="list-inline text-center">
          <li class="list-inline-item">
            <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                  </span>
            </a>
          </li>
        </ul>
        <p class="copyright text-muted">Copyright &copy; Jean Forteroche 2017</p>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/app/view/vendor/jquery/jquery.min.js"></script>
<script src="/app/view/vendor/popper/popper.min.js"></script>
<script src="/app/view/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Custom scripts for this template -->
<script src="/app/view/js/clean-blog.min.js"></script>

</body>

</html>
