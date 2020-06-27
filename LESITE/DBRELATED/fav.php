<?php
    include("../essentials/header.php");

    // include('../DBRELATED/pdo_covidirect.php');

    // try{-
    //     require("../DBRELATED/config.php");
    // }catch(Exception $e) {
    //     throw new Exception("No config ! Incorrect file path or the file is corrupted");
    // }

    $bdd = db_covidirect::getInstance();

    $requete = $bdd->prepare("SELECT * from to_fav where to_fav.iduser=:iduser and to_fav.idad=:idad");

    $requete->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_INT);
    $requete->bindValue(':idad', $_GET['id'], PDO::PARAM_INT);
 
   $_SESSION['id_temp_fav'] = $_GET['id'];

    $requete->execute();
    $arr = $requete->fetchAll();
    $requete->closeCursor();


    if ($arr != null) {

        echo '
            <form action="../DBRELATED/switch_fav.php" method="POST">
                <button  class="btn" href="" type="submit" name="unfav">
                    <div class="d-flex justify-content-between">
                        <p><i style="margin-right:10px;color:gold;" class="fas fa-star fa-lg"></i>    Retirer des favoris</p>
                        </div>
                    </button>
                </form>
            ';
    }
    else { 
         echo '<form action="../DBRELATED/switch_fav.php" method="POST">
                    <button class="btn" href="" type="submit" name="fav">
                        <div class="d-flex justify-content-between">
                             <p><i style="margin-right:10px;color:gold;" class="far fa-star fa-lg"></i>    Ajouter aux favoris</p>
                        </div>
                    </button>
                </form>';
            
    }

?>    
<!-- $requete = $bdd->prepare("SELECT * from ads inner join to_fav on ads.idad=to_fav.idad inner join users on ads.iduser=users.iduser where to_fav.iduser=:iduser"); -->
        <!-- $_SESSION['temp'] = `<div class="d-flex justify-content-between">
                <p><i style="margin-right:10px;color:gold;" class="fas fa-star fa-lg"></i>    Retirer des favoris</p>
              </div>`; -->