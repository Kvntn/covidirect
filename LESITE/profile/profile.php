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
                <a class="nav-link active" href="#p1" data-toggle="tab">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#p2" data-toggle="tab">Mes posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#p3" data-toggle="tab">Liste des favoris</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#p4" data-toggle="tab">Envoyer un message</a>
            </li>
        </ul>
    </div>
</div>

<div class="tab-content">



    <div class="card-body tab-pane active" id="p1"> 

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"><img src="../resources/images/thomas.jpg"><?php echo $_SESSION['nom'],'    ',$_SESSION['prenom'];?></h5>
                <li class="list-group-item"><i class="fas fa-map-pin fa-lg"></i>    Localisation de l'utilisateur : <?php echo $_SESSION['userlocation']?></li>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier votre profil</h4>
                </div>
            <div class="card-body">
            <form action="profileUpdate.php">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><div class="row">
                    <div class="col">
                    <label>Nom</label>
                    <input type="text" class="form-control" name="nom" required="required" placeholder="<?php echo $_SESSION['nom']?>">
                    </div>
                    <div class="col">
                    <label>Prenom</label>
                    <input type="text" class="form-control" required="required" name="prenom" placeholder="<?php echo $_SESSION['prenom']?>">
                    </div>
                </div></li>
                <li class="list-group-item"><div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Ancien mot de passe</label>
                    <input type="password" required="required" class="form-control" id="inputPassword4" placeholder="Ancien mot de passe">
                    </div>
                    <div class="form-group col-md-6">
                    <label>Nouveau mot de passe</label>
                    <input type="password" required="required" class="form-control" id="inputPassword4" placeholder="Nouveau mot de passe">
                    </div>
                </div></li>
                <li class="list-group-item"><div class="form-row">
                    <div class="form-group col-md">
                    <label>Email</label>
                    <input type="email" required="required" class="form-control" id="inputEmail4" placeholder="<?php echo $_SESSION['email']?>">
                    </div>
                </div></li>
                <li class="list-group-item"><div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Département</label>
		            <input type="text" required="required" name="userlocation" class="form-control" placeholder="<?php echo $_SESSION['userlocation']?>">
                    </div>
                    <div class="form-group col-md-6">
                    <label>Photo de profil</label>
                    <input type="file" name="userphoto" class="form-control-file"></input>
                    </div>
                </div></li>
                <li class="list-group-item">
                <p class="signin button">
                <input type="submit" class="btn btn-secondary"value="Modifier le profile"/>
                </p>
                </li>
            </ul>  
            </div>
            </form> 
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
    
              $requete = $bdd->prepare("SELECT * from ads where iduser=:iduser ORDER BY idad DESC");
  
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





























    