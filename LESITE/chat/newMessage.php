<?php




try{
    require "../DBRELATED/config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

include "../essentials/header.php";

$bdd = db_covidirect::getInstance();

$requete = $bdd->prepare("SELECT iduser from ads WHERE idad=:idad");
$requete->bindValue(':idad', $_GET['id'], PDO::PARAM_INT);    
    $requete->execute();
    $arr = $requete->fetch();
    $requete->closeCursor();
    $idreceiver = $arr['iduser'];

$LocalRequest = $bdd->prepare("INSERT INTO `message`(`message`, datemessage, idsender, idreceiver) 
                        VALUES (:msg,:Dmsg,:idsend,:idreceiv)");


$LocalRequest->bindValue(':msg', $_POST['message'], PDO::PARAM_STR);
$LocalRequest->bindValue(':Dmsg', date("Y-m-d H:i:s"), PDO::PARAM_STR);
$LocalRequest->bindValue(':idsend', $_SESSION['iduser'], PDO::PARAM_STR);
$LocalRequest->bindValue(':idreceiv', $idreceiver, PDO::PARAM_STR);



$LocalRequest->execute();
$LocalRequest->closeCursor();
echo '<script> document.location.replace("chat.php"); </script>';
?>
