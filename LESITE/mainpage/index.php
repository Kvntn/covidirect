<?php
    include("../essentials/header.php");
    include("../essentials/nav.php");
    include("../essentials/footer.php");
?>

<div class="container-searchbar">
<form method="POST" action="../DBRELATED/scriptSearch.php">
    <div class="form-row" style="margin-left:10px;">

        <div class="col">
            <label style="color:black;">Situation</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option value=0>Demande de l'aide</option>
                <option value=1>Proposition d'aide</option>
            </select>
        </div>

        <div class="col">
            <label style="color:black;">Type d'aide</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option value=Service>Service</option>
                <option value=Transport>Transport</option>
                <option value=Materiel>Matériel</option>
                <option value=Hebergement>Hébergement</option>
                <option value=Autre..>Autre..</option>
            </select>
        </div>

        <div class="col">
            <label style="color:black;">Département</label>
            <input name=departement  class="form-control" style="margin-left:10px;" type="number" min="1" value="1" max="1000">
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
          $minid = 0;

/*        if (isset($_POST['search']))
        {
          $mot = $_POST['search'];
          $requete = $bdd->prepare("SELECT * from listeproduits WHERE Categorie LIKE '%$mot%'");
          $requete->execute();
          $listproducts = $requete->fetchAll();
          $products = new Product($listproducts);
          $products->display($listproducts);
        }*/
          $requete = $bdd->prepare("SELECT * from ads inner join users on ads.iduser = users.iduser");
          $requete->execute();
          $listad = $requete->fetchAll();
          $ads = new Ads($listad);
          $ads->display($listad);
//        }
     ?>

</div>

</div>
