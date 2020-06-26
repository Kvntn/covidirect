<?php
    include("../essentials/header.php");
    include("../essentials/nav.php");
    include("../essentials/footer.php");
?>

<div class="container-profil">

<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#p1" data-toggle="tab">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#p2" data-toggle="tab">Mes posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#p3" data-toggle="tab">Liste des favoris</a>
            </li>
        </ul>
    </div>
</div>

<div class="tab-content">



    <div class="card-body tab-pane active" id="p1">        
        <div class="container-profil">
        <div class="card" style="width: 35rem;">
            <div class="card-title text-center">
                <img src="../resources/images/thomas.jpg" alt="..." class="img rounded-circle"> <?php echo $_SESSION['nom'], $_SESSION['prenom']; ?>
            </div>

            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <a href=""><li class="list-group-item"><i class="fas fa-map-pin"></i> <?php echo $_SESSION['userlocation']; ?> </li></a>
                </ul>
            </div>
        </div>
        </div>
    </div pan1>

    <div class="card-body tab-pane" id="p2">
        <?php   
          require('../DBRELATED/adsDisplay.php');
          require('../DBRELATED/pdo_covidirect.php');
          try{
          require("../DBRELATED/config.php");
              }catch(Exception $e) {
                  throw new Exception("No config ! Incorrect file path or the file is corrupted");
              }
              $bdd = db_covidirect::getInstance();
    
              $requete = $bdd->prepare("SELECT * from ads where iduser=:iduser");
  
              $requete->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_INT);
  
              $requete->execute();
              $listad = $requete->fetchAll();
              $ads = new Ads($listad);
              $ads->display($listad);
         ?>
    </div pan2>

    <div class="card-body tab-pane" id="p3">
        <?php
              $bdd = db_covidirect::getInstance();
    
              $requete = $bdd->prepare("SELECT * from ads inner join to_fav on ads.idad=to_fav.idad inner join users on ads.iduser=users.iduser where to_fav.iduser=:iduser");
  
              $requete->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_INT);
  
              $requete->execute();
              $listad = $requete->fetchAll();
              $ads = new Ads($listad);
              $ads->display($listad);
  
        ?>
    </div pan3>

   




</div tab content>

</div container prof>





























    