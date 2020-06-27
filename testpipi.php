<?php
    include("LESITE/essentials/header.php");

    require_once 'LESITE/DBRELATED/config.php';
    $bdd = db_covidirect::getInstance();

    if(isset($_POST["insert"]))  
    {  
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  


        $LocalRequest = $bdd->prepare("UPDATE users SET userphoto = :pp WHERE iduser=:iduser");

        $LocalRequest->bindValue(':pp', $file, PDO::PARAM_LOB);
        $LocalRequest->bindValue(':iduser', 37, PDO::PARAM_INT);
        $LocalRequest->execute();

        if($LocalRequest->execute() == TRUE)
        {  
            echo '<script>alert("Image Inserted into Database")</script>';  
        }
        $LocalRequest->closeCursor();  
    }  
 ?>  

          <body>  
               <br /><br />  
               <div class="container" style="width:500px;">  
                    <h3 align="center">Insert and Display Images From Mysql Database in PHP</h3>  
                    <br />  
                    <form method="post" enctype="multipart/form-data">  
                         <input type="file" name="image" id="image" />  
                         <br />  
                         <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                    </form>  
                    <br />  
                    <br />  
                    <table class="table table-bordered">  
                         <tr>  
                              <th>Image</th>  
                         </tr>  
                    <?php

                    $LocalRequest = $bdd->prepare("SELECT userphoto FROM users WHERE iduser=37");
                    $LocalRequest->execute();
                    $fetch =  $LocalRequest->fetch();
                    $LocalRequest->closeCursor();
                    //var_dump($fetch);
                    echo '  
                         <tr>  
                              <td>  
                                   <img src="data:userphoto/jpeg;base64,'.base64_encode(stripslashes($fetch['userphoto'])).' height="200" width="200" class="img-thumnail" " />  
                              </td>  
                         </tr>' ;  
                    ?>  
                </table>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
