<?php
    include("../essentials/header.php");
    include('../DBRELATED/pdo_covidirect.php');

    try{-
        require("../DBRELATED/config.php");
    }catch(Exception $e) {
        throw new Exception("No config ! Incorrect file path or the file is corrupted");
    }
    
    $bdd = db_covidirect::getInstance();

    if(isset($_POST['unfav'])) {

        $requete = $bdd->prepare("DELETE from to_fav where to_fav.iduser=:iduser and to_fav.idad=:idad");

        $requete->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_INT);
        $requete->bindValue(':idad', $_SESSION['id_temp_fav'], PDO::PARAM_INT);

        $requete->execute();

    }
    else {
        $requete = $bdd->prepare("INSERT INTO to_fav VALUES (:idad, :iduser)");

        $requete->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_INT);
        $requete->bindValue(':idad', $_SESSION['id_temp_fav'], PDO::PARAM_INT);

        $requete->execute();
    }

   
    $requete->closeCursor();
    
    echo '<script> document.location.replace("../mainpage/singleAd.php?id=',$_SESSION['id_temp_fav'],'"); </script>';
    
?>