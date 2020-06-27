<?php
    include("../essentials/header.php");
    include("../essentials/nav.php");
    include("../essentials/footer.php");
   $_GET = $_GET;
?>
<!-- <script type="text/javascript" src="../ressource/script/message.js"></script> -->
 <?php
  // include("fetchMessage.php");
?>

<div class="container-chat">
  
<div class="row">

  <div class="col-sm-4 container-contact">
    <div class="card">
      <div class="card-body">
      <?php
        include("fetchContacts.php");
      ?> 
      </div>
    </div>
  </div>

  <div class="col-sm-8 container-msg">
    <div class="card">
      <div class="card-body">
      
      <?php
        include("fetchMessage.php");
      ?>
      
      <div class="form-chat">
      <form method="POST"  class="form-inline" action="sendMessage.php">    
              <input type="text" required="required" class="form-control" name="message" id="message" placeholder="Type a message" />
              <button class="btn" type="submit" id="envoi"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
      </form>
      </div>

      </div>
    </div>
  </div>
  

</div>

</div>