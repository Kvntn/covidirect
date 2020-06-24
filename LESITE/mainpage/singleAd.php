<?php
    include("../essentials/header.php");
    include("../essentials/nav.php");
    include("../essentials/footer.php");

    require('../DBRELATED/pdo_covidirect.php');
    require('../DBRELATED/commDisplay.php');

      try{
          require("../DBRELATED/config.php");
      }catch(Exception $e) {
          throw new Exception("No config ! Incorrect file path or the file is corrupted");
      }
    $bdd = db_covidirect::getInstance();
    $requete = $bdd->prepare("SELECT * from ad inner join users on ad.iduser = users.iduser WHERE ad.idad=:idad");

    $requete->bindValue(':idad', $_GET['id'], PDO::PARAM_INT);    
    $requete->execute();
    $ad = $requete->fetch();
//    $requete->closeCursor();
    
    $bdd2 = db_covidirect::getInstance();
    $requete2 = $bdd2->prepare("SELECT * from comments inner join users on comments.iduser = users.iduser WHERE comments.idad=:idad");
    $requete2->bindValue(':idad', $_GET['id'], PDO::PARAM_INT);    
    $requete2->execute();
    $listcomm = $requete2->fetch();
//    $requete2->closeCursor();

?>

<div class="container-singlead">
<div class="card text-center">


  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#p1" data-toggle="tab">Annonce</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#p2" data-toggle="tab">Commentaires</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#p3" data-toggle="tab">Poster un commentaire</a>
      </li>
    </ul>
  </div>

<div class="tab-content">
  <div class="card-body tab-pane active" id="p1">

        <div class="card-header bg-white">
            <img src="../resources/images/thomas.jpg" alt="..." class="img rounded-circle text-inline"> <?php echo $ad['nom'], ' ' , $ad['prenom']; ?>
        </div>
        <div class="card-body">
                <div class="card-title">
                    <h5><?php echo $ad['title']; ?></h5>
                </div>
                <p class="card-text"><?php echo $ad['descriptionad']; ?></p>
                <div class="d-flex justify-content-between ">
                    <p><small class="text-muted">Postée le <?php echo $ad['datead']; ?> et valable jusqu'au <?php echo $ad['expirationdate']; ?></small></p>
                    <p><small class="text-muted">#<?php echo $ad['typead']; ?></small></p>
                </div>
                <div class="d-flex justify-content-between">
                    <p><i style="margin-right:10px;color:gold;" class="far fa-star fa-lg"></i>    Ajouter aux favoris</p>
                </div>
        </div>
  </div>

  <div class="card-body tab-pane" id="p2">

      <?php 
        $comments = new Comment($listcomm);
        $comments->display($listcomm);
      ?>

  </div>

  <div class="card-body tab-pane" id="p3">
    <form method="POST" action="../DBRELATED/scriptComment.php?id=<?php echo $_GET['id']; ?>">
    <div class="form-group">
        <label>Poster un commentaire ?</label>
        <input class="form-control" id="textcomment" name="textcomment" aria-describedby="emailHelp" placeholder="">
        <small class="form-text text-muted">Il seras visible par tout les utilisateurs</small>
    </div>
    <p class="signin button">
    	<input type="submit" class="btn btn-secondary"value="Publier"/>
    </p>
    </form>

  </div>
</div>


</div>
</div>
