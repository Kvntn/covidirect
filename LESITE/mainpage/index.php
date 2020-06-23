<?php
    include("../essentials/header.php");
    include("../essentials/nav.php");
    include("../essentials/footer.php");
?>

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
          $requete = $bdd->prepare("SELECT * from ad inner join users on ad.iduser = users.iduser");
          $requete->execute();
          $listad = $requete->fetchAll();
          $ads = new Ads($listad);
          $ads->display($listad);
//        }
     ?>

</div>

</div>
