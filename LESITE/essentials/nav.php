

<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="../mainpage/index.php"><i class="fas fa-shield-virus fa-lg" style="margin-left:10px;margin-right:10px;"></i>Covidirect</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse d-flex bd-highlight" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../mainpage/index.php">Acceuil</a>
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
        <a class="nav-link" href="../DBRELATED/sssDestroy.php">Se deconnecter<i style="margin-left:10px;" class="fas fa-sign-in-alt fa-sm"></i></a>
      </li>
     ';
    
    }
      ?>    
    </ul>
  </div>  
</nav>

<?php
  include("header.php");
?>