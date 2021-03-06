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
    $requete = $bdd->prepare("SELECT * from ads inner join users on ads.iduser = users.iduser WHERE ads.idad=:idad");

    $requete->bindValue(':idad', $_GET['id'], PDO::PARAM_INT);    
    $requete->execute();
    $ad = $requete->fetch();
    $requete->closeCursor();
    
    $bdd2 = db_covidirect::getInstance();
    $requete2 = $bdd2->prepare("SELECT * from comments inner join users on comments.iduser = users.iduser WHERE comments.idad=:idad  ORDER BY comments.idcomment DESC");
    $requete2->bindValue(':idad', $_GET['id'], PDO::PARAM_INT);    
    $requete2->execute();
    $listcomm = $requete2->fetchAll();
    $requete2->closeCursor();

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
      
  <?php 

  if($_SESSION['iduser'] != $ad['iduser']) {
    echo '<li class="nav-item">
            <a class="nav-link" href="#p4" data-toggle="tab">Envoyer un message privé</a>
          </li>';
      }
  ?>
    </ul>
  </div>

<div class="tab-content">
    
  <div class="card-body tab-pane active" id="p1">

        <div class="card-header bg-white">
            <img src=<?php echo '"data:userphoto/jpeg;base64,'.base64_encode(stripslashes($ad['userphoto'])).'"';?> alt="..." class="img rounded-circle text-inline"> <?php echo $ad['nom'], ' ' , $ad['prenom']; ?>
        </div>
        <div class="card-body">
                <div class="card-title">
                    <h5><?php echo $ad['title']; ?></h5>
                </div>
                <p class="card-text"><?php echo $ad['descriptionad']; ?></p>
                <div class="d-flex justify-content-between ">
                    <p><small class="text-muted">Postée le <?php echo $ad['datead']; ?>, valable jusqu'au <?php echo $ad['expirationdate']; ?></small></p>
                    <p><small class="text-muted">#<?php echo $ad['typead']; ?></small></p>
                </div>
                <?php 
                include("../DBRELATED/fav.php");
                //$_SESSION['id_temp_fav'] = null;
                ?>
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
        <input class="form-control" id="textcomment" name="textcomment" aria-describedby="emailHelp" placeholder="" required>
        <small class="form-text text-muted">Il sera visible par tout les utilisateurs</small>
    </div>
    <p class="signin button">
      <?php 
      
        if(isset($_SESSION['login'])) {
          echo '<input type="submit" class="btn btn-secondary"value="Publier"/>';
        }else{
          echo '<p style="text-align:center;">Connectez vous pour poster un commentaire.</p>';
        }
      
      ?>
    </p>
    </form>

  </div>

  <div class="card-body tab-pane" id="p4">
  <form method="POST" action="../chat/newMessage.php?id=<?php echo $_GET['id']; ?>">
    <div class="form-group">
        <label>Envoyer un message au propriétaire de l'annonce.</label>
        <input class="form-control" id="textcomment" name="message" aria-describedby="emailHelp" placeholder="" required>
        <small class="form-text text-muted">Vous pourrez retrouver tous vos messages dans l'onglet "Mes messages".</small>
    </div>
    <p class="signin button">
      <?php 
      
        if(isset($_SESSION['login'])) {
          echo '<input type="submit" class="btn btn-secondary"value="Envoyer"/>';
        }else{
          echo '<p style="text-align:center;">Connectez vous pour pouvoir envoyer des messages</p>';
        }
      
      ?>
    </p>
    </form>
  </div pan 4>

</div fin des panneaux>


</div>
</div>
