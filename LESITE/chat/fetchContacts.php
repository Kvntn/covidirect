<?php
if (!isset($_SESSION)){
    session_start();
}
try{
    require "../DBRELATED/config.php";
    require "displayContacts.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

$bdd = db_covidirect::getInstance();

// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("SELECT DISTINCT iduser, prenom, nom FROM `users` inner join `message` where `message`.idsender= users.iduser OR `message`.idreceiver= users.iduser ");

$requete->bindValue(':ids', $_SESSION['iduser'], PDO::PARAM_STR);
$requete->bindValue(':idr', $_SESSION['iduser'], PDO::PARAM_STR);

$requete->execute();
$arr = $requete->fetchAll();
$requete->closeCursor();


foreach($arr as $x => $y){
    $ok = new Contact($y);
    $ok->display($ok);
}

?>
