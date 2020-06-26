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
                <option value="">Choisir la situation</option>
                <option value=0>Demandes d'aide</option>
                <option value=1>Propositions d'aide</option>
            </select>
        </div>

        <div class="col">
            <label style="color:black;">Type d'aide</label>
            <select class="form-control" name=typead id="exampleFormControlSelect1">
                <option value="">Choisir le type d'aide</option>
                <option value=Service>Service</option>
                <option value="Transport">Transport</option>
                <option value="Materiel">Matériel</option>
                <option value="Hebergement">Hébergement</option>
                <option value="Autre">Autre..</option>
            </select>
        </div>

        <div class="col">
            <label style="color:black;">Département</label>

        <input name=adlocation  class="form-control" style="margin-left:10px;" type="number" min="1" max="1000">
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

        function removeElementWithValue($array, $key, $value){
            foreach($array as $subKey => $subArray){
                if($subArray[$key] != $value){
                    unset($array[$subKey]);
                }
            }
            return $array;
        }
          
        require('../DBRELATED/adsDisplay.php');
        require("../DBRELATED/config.php");
        $bdd = db_covidirect::getInstance();

        $requete = $bdd->prepare("SELECT * from ads inner join users on ads.iduser = users.iduser ORDER BY idad DESC LIMIT 20");
        $requete->execute();
        $listad = $requete->fetchAll();
        $requete->closeCursor();

        if (!empty($_POST)) {
        
            $requete = $bdd->prepare("SELECT * from ads inner join users on ads.iduser = users.iduser ORDER BY idad DESC");
            $requete->execute();
            $listad = $requete->fetchAll();
            $requete->closeCursor();
            switch($_POST) {

                case (($_POST['statut'] != "") && ($_POST['adlocation'] != "") && ($_POST['typead'] != "" )):
                $selectads = removeElementWithValue($listad, "statut", $_POST['statut']);
                $selectads = removeElementWithValue($listad, "adlocation", $_POST['adlocation']);
                $selectads = removeElementWithValue($listad, "typead", $_POST['typead']);
                $listad = $selectads;
                break;
    
                case (($_POST['statut'] != "") && ($_POST['adlocation'] != "") && ($_POST['typead'] == "")):
                $selectads = removeElementWithValue($listad, "statut", $_POST['statut']);
                $selectads = removeElementWithValue($listad, "adlocation", $_POST['adlocation']);
                $listad = $selectads;
                break;
    
                case (($_POST['statut'] != "") && ($_POST['adlocation'] == "") && ($_POST['typead'] != "")):
                $selectads = removeElementWithValue($listad, "statut", $_POST['statut']);
                $selectads = removeElementWithValue($listad, "typead", $_POST['typead']);
                $listad = $selectads;
                break;
    
                case (($_POST['statut'] == "") && ($_POST['adlocation'] != "") && ($_POST['typead'] != "")):
                $selectads = removeElementWithValue($listad, "adlocation", $_POST['adlocation']);
                $selectads = removeElementWithValue($listad, "typead", $_POST['typead']);
                $listad = $selectads;
                break;
    
                case (($_POST['statut'] != "") && ($_POST['adlocation'] == "") && ($_POST['typead'] == "")):
                $selectads = removeElementWithValue($listad, "statut", $_POST['statut']);
                $listad = $selectads;
                break;
    
                case (($_POST['statut'] == "") && ($_POST['adlocation'] != "") && ($_POST['typead'] == "")):
                $selectads = removeElementWithValue($listad, "adlocation", $_POST['adlocation']);
                $listad = $selectads;
                break;
    
                case (($_POST['statut'] == "") && ($_POST['adlocation'] == "") && ($_POST['typead'] != "")):
                $selectads = removeElementWithValue($listad, "typead", $_POST['typead']);
                $listad = $selectads;
                break;
    
                default :
                break;
            } 
        }
        $ads = new Ads($listad);
        $ads->display($listad);
        
     ?>

</div>

<form action="" class="text-justify" method="get">
    <button name="button" class="btn btn-dark" type="submit" value="previous"><i class="fas fa-arrow-left"></i></button>
    <button name="button" class="btn btn-dark" type="submit" value="next"><i class="fas fa-arrow-right"></i></button>
</form>

</div>
