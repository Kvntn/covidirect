<?php
if (!isset($_SESSION)){
    session_start();
}
try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

$datecomm = date("d-m-Y");

$bdd = db_covidirect::getInstance();

$requete = $bdd->prepare("INSERT INTO comments(textcomment, datecomment, idad, iduser) VALUES (:textcomment, :datecomment, :idad, :iduser)");


$requete->bindValue(':textcomment', $_POST['textcomment'], PDO::PARAM_LOB);
$requete->bindValue(':datecomment', $datecomm, PDO::PARAM_STR);
$requete->bindValue(':idad', $_GET["id"], PDO::PARAM_INT);
$requete->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_INT);

$requete->execute();
$requete->closeCursor();

echo '<script> document.location.replace("../mainpage/singleAd.php?id=', $_GET['id'] ,'"); </script>';