<?php
    include("../essentials/header.php");
    include("../essentials/nav.php");
    include("../essentials/footer.php");
?>

<div class="container-profil">

<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#p1" data-toggle="tab">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#p2" data-toggle="tab">Mes posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#p3" data-toggle="tab">Liste des favoris</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#p4" data-toggle="tab">Mes messages</a>
            </li>
        </ul>
    </div>
</div>

<div class="tab-content">



    <div class="card-body tab-pane active" id="p1">        
        <div class="container-profil">
        <div class="card" style="width: 35rem;">
            <div class="card-title text-center">
                <img src="../resources/images/thomas.jpg" alt="..." class="img rounded-circle"> <?php echo $_SESSION['nom'],' ', $_SESSION['prenom']; ?>
            </div>

            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fa fa-at"></i> <?php echo $_SESSION['email']; ?> </li>
                    <li class="list-group-item"><i class="fas fa-map-pin"></i> <?php echo $_SESSION['userlocation']; ?> </li>
                </ul>
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
    
              $requete = $bdd->prepare("SELECT * from ads where iduser=:iduser");
  
              $requete->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_INT);
  
              $requete->execute();
              $listad = $requete->fetchAll();
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

    <div class="card-body tab-pane" id="p4">
    <body style="">
    <div class="container-chat">
    <div class="messaging">

      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="inbox_chat">

            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>

            
          </div>
        </div>

        <div class="mesgs">
          <div class="msg_history">
              
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test which is a new approach to have all
                    solutions</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
              </div>
            </div>

            
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Test which is a new approach to have all
                  solutions</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test, which is a new approach to have</p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Apollo University, Delhi, India Test</p>
                <span class="time_date"> 11:01 AM    |    Today</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>We work directly with our designers and suppliers,
                    and sell direct to you, which means quality, exclusive
                    products, at a price anyone can afford.</p>
                  <span class="time_date"> 11:01 AM    |    Today</span></div>
              </div>
            </div>
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
      
      
    </div></div>
    </body>

    </div pan4>





</div tab content>

</div container prof>





























    