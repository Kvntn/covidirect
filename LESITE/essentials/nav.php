<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbars/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">
<?php
  include("header.php");
?>


<nav class="mb-1 navbar navbar-expand bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="../mainpage/index.php"><i class="fas fa-shield-virus fa-lg" style="margin-left:10px;margin-right:10px;"></i>Covidirect</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse d-flex bd-highlight" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../mainpage/index.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../mainpage/info.php">Informations</a>
      </li>
      <?php
      if(!isset($_SESSION['login'])) {
      echo'
      <li class="nav-item">
        <a class="nav-link" href="../profile/login.php">Se connecter<i style="margin-left:10px;"class="fas fa-sign-in-alt fa-sm"></i></a>
      </li>';
    }
    else {
    echo'
      <li class="nav-item">
        <a class="nav-link" href="../mainpage/ads.php">Poster une annonce</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="../profile/profile.php">Mon profil</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="../chat/chat.php">Mes messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../DBRELATED/sssDestroy.php">Se deconnecter<i style="margin-left:10px;" class="fas fa-sign-in-alt fa-sm"></i></a>
      </li>
      
     ';
    
    }
      ?>    
    </ul>
  </div>  
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</nav>
