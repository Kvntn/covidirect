<?php
    include("LESITE/essentials/header.php");

    require_once 'LESITE/DBRELATED/pdo_covidirect.php';

    db_covidirect::setConfig('mysql:host=localhost;dbname=test;', 'root', '');


?>
<br><br><br>

<form method="POST" action="">

<div class="form-group col-md-6">
    <label>Photo de profil</label>
    <input type="file" name="userphoto" class="form-control-file" enctype="multipart/form-data">
    </input>
</div> <!-- form-group end.// -->

<p class="signin button">
    	<input type="submit" class="btn btn-secondary"value="Poster"/>
    </p>
</form>


<?php 

if (!empty($_POST)) {

    var_dump($_FILES);
    var_dump($_POST);

    $image = $_FILES[‘userphoto’][‘tmp_name’];
    $name = $_FILES[‘userphoto’][‘name’];
    $image = base64_encode(file_get_contents(addslashes($image)));

    $bdd = db_covidirect::getInstance();
    
    $LocalRequest = $bdd->prepare("INSERT INTO test(images) VALUES (:pp)");

    $LocalRequest->bindValue(':pp', $image, PDO::PARAM_LOB);
    $LocalRequest->execute();
    $LocalRequest->closeCursor();
}

?>