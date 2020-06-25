<?php
    include("../essentials/header.php");
    include("../essentials/nav.php");
    include("../essentials/footer.php");
?>

<div class="container-searchbar">
<form method="POST" action="">
    <div class="form-row" style="margin-left:10px;">

        <div class="col">
            <label style="color:black;">Situation</label>
            <select class="form-control" name=statut id="exampleFormControlSelect1">
                <option value=0>Demande de l'aide</option>
                <option value=1>Proposition d'aide</option>
            </select>
        </div>

        <div class="col">
            <label style="color:black;">Type d'aide</label>
            <select class="form-control" name=typead id="exampleFormControlSelect1">
                <option value=Service>Service</option>
                <option value=Transport>Transport</option>
                <option value=Materiel>Matériel</option>
                <option value=Hebergement>Hébergement</option>
                <option value=Autre..>Autre..</option>
            </select>
        </div>

        <div class="col">
            <label style="color:black;">Département</label>
            <input name=adlocation  class="form-control" style="margin-left:10px;" type="number" min="1" value="1" max="1000">
        </div>

        <div class="col">
            <button type="submit" class="btn btn-dark" style="margin-left:10px;margin-top:32px;">Rechercher</button>
        </div>

    </div>
    </form>
</div>

<div class="container-index">

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
            
        switch($_POST) {

            case (isset($_POST['statut']) && isset($_POST['adlocation']) && isset($_POST['typad'])):
            $requete = $bdd->prepare("SELECT * from ads inner join users on ads.iduser = users.iduser WHERE ads.statut=:statut AND ads.adlocation=:adlocation AND ads.typad=:typead");
            $requete->bindValue(':statut', $_POST['statut'], PDO::PARAM_STR);
            $requete->bindValue(':typead', $_POST['typead'], PDO::PARAM_STR);
            $requete->bindValue(':adlocation', $_POST['adlocation'], PDO::PARAM_STR);
            break;

            case (isset($_POST['statut']) && isset($_POST['adlocation']) && isnull($_POST['typad'])):
            $requete = $bdd->prepare("SELECT * from ads inner join users on ads.iduser = users.iduser WHERE ads.statut=:statut AND ads.adlocation=:adlocation");
            $requete->bindValue(':statut', $_POST['statut'], PDO::PARAM_STR);
            $requete->bindValue(':adlocation', $_POST['adlocation'], PDO::PARAM_STR);
            break;

            case (isset($_POST['statut']) && isnull($_POST['adlocation']) && isset($_POST['typad'])):
            $requete = $bdd->prepare("SELECT * from ads inner join users on ads.iduser = users.iduser WHERE ads.statut=:statut AND ads.typad=:typead");
            $requete->bindValue(':statut', $_POST['statut'], PDO::PARAM_STR);
            $requete->bindValue(':typead', $_POST['typead'], PDO::PARAM_STR);
            break;

            case (isnull($_POST['statut']) && isset($_POST['adlocation']) && isset($_POST['typad'])):
            $requete = $bdd->prepare("SELECT * from ads inner join users on ads.iduser = users.iduser WHERE ads.adlocation=:adlocation AND ads.typad=:typead");
            $requete->bindValue(':typead', $_POST['typead'], PDO::PARAM_STR);
            $requete->bindValue(':adlocation', $_POST['adlocation'], PDO::PARAM_STR);
            break;

            case (isset($_POST['statut']) && isnull($_POST['adlocation']) && isnull($_POST['typad'])):
            $requete = $bdd->prepare("SELECT * from ads inner join users on ads.iduser = users.iduser WHERE ads.statut=:statut");
            $requete->bindValue(':statut', $_POST['statut'], PDO::PARAM_STR);
            break;

            case (isnull($_POST['statut']) && isset($_POST['adlocation']) && isnull($_POST['typad'])):
            $requete = $bdd->prepare("SELECT * from ads inner join users on ads.iduser = users.iduser WHERE ads.adlocation=:adlocation");
            $requete->bindValue(':adlocation', $_POST['adlocation'], PDO::PARAM_STR);
            break;

            case (isnull($_POST['statut']) && isnull($_POST['adlocation']) && isset($_POST['typad'])):
            $requete = $bdd->prepare("SELECT * from ads inner join users on ads.iduser = users.iduser WHERE ads.typad=:typead");
            $requete->bindValue(':typead', $_POST['typead'], PDO::PARAM_STR);
            break;

            default :
            $requete = $bdd->prepare("SELECT * from ads inner join users on ads.iduser = users.iduser");
            break;
        }

            $requete->execute();
            $listad = $requete->fetchAll();
            $ads = new Ads($listad);
            $ads->display($listad);

     ?>

</div>

</div>
