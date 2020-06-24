<?php

//////////////////////////////////
// ADDS NEW AD IN THE DATABASE//
//////////////////////////////////

if (!isset($_SESSION)){
    session_start();
}

try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

//include "../essentials/header.php";

$bdd = db_covidirect::getInstance();


$datead = date("d-m-Y");
$expirationdate = date("d-m-Y", strtotime($datead.' + 180 Days'));



$LocalRequest = $bdd->prepare("INSERT INTO ad(statut, title, descriptionad, datead, expirationdate, typead, adlocation, iduser) 
                        VALUES (:statut,:title,:descriptionad,:datead,:expirationdate, :typead, :adlocation, :iduser)");


$LocalRequest->bindValue(':statut', $_POST['statut'], PDO::PARAM_STR);
$LocalRequest->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
$LocalRequest->bindValue(':descriptionad', $_POST['descriptionad'], PDO::PARAM_LOB);
$LocalRequest->bindValue(':datead', $datead, PDO::PARAM_STR);
$LocalRequest->bindValue(':expirationdate', $expirationdate, PDO::PARAM_STR);
$LocalRequest->bindValue(':typead', $_POST['typead'], PDO::PARAM_STR);
$LocalRequest->bindValue(':adlocation', $_SESSION['userlocation'], PDO::PARAM_STR);
$LocalRequest->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_STR);

$LocalRequest->execute();
$LocalRequest->closeCursor();

echo '<script> document.location.replace("../profile/profile.php"); </script>';

?>
