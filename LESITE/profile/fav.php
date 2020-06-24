<?php
    include("../essentials/header.php");
    include("../essentials/nav.php");
    include("../essentials/footer.php");
?>




<div class="container-profil">
    <div class="card position-fixed" style="width: 35rem;">
        <div class="card-header text-center">
            <img src="../resources/images/thomas.jpg" alt="..." class="img rounded-circle"> <?php echo $_SESSION['nom'], $_SESSION['prenom']; ?>
        </div>

        <div class="card-body">
            <ul class="list-group list-group-flush">
                <a href=""><li class="list-group-item"><i class="fas fa-map-pin"></i> <?php echo $_SESSION['userlocation']; ?> </li></a>
                <a href="fav.php"><li class="list-group-item"><i class="far fa-star"></i> Liste des favoris</li></a>
                <a href="../chat/chat.php"><li class="list-group-item"><i class="fas fa-envelope-open-text"></i>   Acceder à mes messages</li></a>
            </ul>
        </div>
    </div>
</div>

<div class="container-feed">
<div class="row">


    <?php
          
        require('../DBRELATED/adsDisplay.php');
        require('../DBRELATED/pdo_covidirect.php');
        try{
        require("../DBRELATED/config.php");
            }catch(Exception $e) {
                throw new Exception("No config ! Incorrect file path or the file is corrupted");
            }
            $bdd = db_covidirect::getInstance();
  
            $requete = $bdd->prepare("SELECT * from ads inner join to_fav on ads.idad=to_fav.idad inner join users on ads.iduser=users.iduser where to_fav.iduser=37");

            $requete->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_INT);

            $requete->execute();
            $listad = $requete->fetchAll();
            $ads = new Ads($listad);
            $ads->display($listad);

       ?>    

</div>    
</div>