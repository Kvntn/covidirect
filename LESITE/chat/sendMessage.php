<?php


//////////////////////////////////
// ADDS NEW USER IN THE DATABASE//
//////////////////////////////////

try{
    require "../DBRELATED/config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

include "../essentials/header.php";

$bdd = db_covidirect::getInstance();


$LocalRequest = $bdd->prepare("INSERT INTO `message`(`message`, datemessage, idsender, idreceiver) 
                        VALUES (:msg,:Dmsg,:idsend,:idreceiv)");


$LocalRequest->bindValue(':msg', $_POST['message'], PDO::PARAM_STR);
$LocalRequest->bindValue(':Dmsg', date("Y-m-d H:i:s"), PDO::PARAM_STR);
$LocalRequest->bindValue(':idsend', $_SESSION['iduser'], PDO::PARAM_STR);
$LocalRequest->bindValue(':idreceiv', $_SESSION['iduser2'], PDO::PARAM_STR);

$LocalRequest->execute();
$LocalRequest->closeCursor();
header("location: chat.php");
?>

