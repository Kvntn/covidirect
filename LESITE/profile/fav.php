<?php
    include("../essentials/header.php");
    require('../DBRELATED/pdo_covidirect.php');

    // try{-
    //     require("../DBRELATED/config.php");
    // }catch(Exception $e) {
    //     throw new Exception("No config ! Incorrect file path or the file is corrupted");
    // }

    // $bdd = db_covidirect::getInstance();

    $requete = $bdd->prepare("SELECT * from to_fav where to_fav.iduser=:iduser and to_fav.idad=:idad");

    $requete->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_INT);
    $requete->bindValue(':idad', $_POST['data']['idad'], PDO::PARAM_INT);

    $requete->execute();
    $listad = $requete->fetchAll();

    if ($requete->fetchAll() != null) {
        echo `<a class="favourite-form" method="post" type="submit" name="submit" ><i class="far fa-star"></i></a>`;
    }
    else { 
        echo '<a class="favourite-form" method="post" type="submit" name="submit" ><i class="fas fa-star"></i></a>';
    }

?>    
<!-- $requete = $bdd->prepare("SELECT * from ads inner join to_fav on ads.idad=to_fav.idad inner join users on ads.iduser=users.iduser where to_fav.iduser=:iduser"); -->
