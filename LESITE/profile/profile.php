<?php
    include("../essentials/header.php");
    include("../essentials/nav.php");
    include("../essentials/footer.php");

 ?>  


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
        </ul>
    </div>
</div>

<div class="tab-content">



    <div class="card-body tab-pane active" id="p1"> 

    <div class="row container-p1profil">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"><img src="<?php echo 'data:userphoto/jpeg;base64,'.base64_encode(stripslashes($_SESSION['userphoto'])).'">';?><?php echo ' ', $_SESSION['nom'],'  ',$_SESSION['prenom'];?> </h5>
                <li class="list-group-item><i class="fas fa-map-pin fa-lg"></i>    Localisation de l'utilisateur : <?php echo $_SESSION['userlocation']?></li>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier votre profil</h4>
                </div>
            <div class="card-body">
            <form method="post" action="../DBRELATED/profileUpdate.php" enctype="multipart/form-data">
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
                    <input name="ancienmdp" type="password" required="required" class="form-control" id="inputPassword4" placeholder="Ancien mot de passe">
                    </div>
                    <div class="form-group col-md-6">
                    <label>Nouveau mot de passe</label>
                    <input name="nvmdp" type="password" required="required" class="form-control" id="inputPassword4" placeholder="Nouveau mot de passe">
                    </div>
                </div></li>
                <li class="list-group-item"><div class="form-row">
                    <div class="form-group col-md">
                    <label>Email</label>
                    <input name="email" type="email" required="required" class="form-control" id="inputEmail4" placeholder="<?php echo $_SESSION['email']?>">
                    </div>
                </div></li>
                <li class="list-group-item"><div class="form-row">
                    <div class="form-group col-md-6">
                    <label>Département</label>
		            <input type="text" required="required" name="userlocation" class="form-control" placeholder="<?php echo $_SESSION['userlocation']?>">
                    </div>
                    <div class="form-group col-md-6">
                    <label>Photo de profil</label>
                    <input type="file" name="image" id="image" class="form-control-file"></input>
                    </div>
                </div></li>
                <li class="list-group-item">
                <p class="signin button">
                <input type="submit" class="btn btn-secondary"value="Modifier le profil"/>
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

            $requeteNP = $bdd->prepare("SELECT * from users where iduser=:iduser ");
            $requeteNP->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_INT);

            $requeteNP->execute();
            $listNP = $requeteNP->fetchAll();
            $requeteNP->closeCursor();

            $requete = $bdd->prepare("SELECT * from ads where iduser=:iduser ORDER BY idad DESC");
            $requete->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_INT);

            $requete->execute();
            $listad = $requete->fetchAll();
            $requete->closeCursor();

            $_SESSION['nom_displayad'] = $_SESSION['nom'];
            $_SESSION['prenom_displayad'] = $_SESSION['prenom'];

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





























    