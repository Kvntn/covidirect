<?php

//////////////////////////////////
// ADDS NEW USER IN THE DATABASE//
//////////////////////////////////

try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

include "../essentials/header.php";

$bdd = db_covidirect::getInstance();

$datead = 1;
$expirationdate = 1;

$LocalRequest = $bdd->prepare("INSERT INTO ad(statut, title, descriptionad, datead, expirationdate, typead) 
                        VALUES (:statut,:title,:descriptionad,:datead,:expirationdate, :typead)");


$LocalRequest->bindValue(':statut', $_POST['statut'], PDO::PARAM_STR);
$LocalRequest->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
$LocalRequest->bindValue(':descriptionad', $_POST['descriptionad'], PDO::PARAM_STR);
$LocalRequest->bindValue(':datead', $datead, PDO::PARAM_INT);
$LocalRequest->bindValue(':expirationdate', $expirationdate, PDO::PARAM_STR);
$LocalRequest->bindValue(':typead', $_POST['typead'], PDO::PARAM_STR);

$LocalRequest->execute();
$LocalRequest->closeCursor();

?>
