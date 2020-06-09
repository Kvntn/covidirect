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
include "../essentials/nav.php";

//Longueur du mots de passe
$nb_char = 6;


if (strlen($_POST['motDePasse']) < $nb_char) {
    echo "Mot de passe trop court !";
}

if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['motDePasse'])) {
    echo 'Mot de passe conforme';
} else {
    echo '<script> document.location.replace("register.php"); </script>';
    die();
}	



if($_POST['confirmPassword'] != $_POST['motDePasse']){
    echo "<h1>Les mots de passe ne correspondent pas</h1>";
    echo '<script> document.location.replace("register.php"); </script>';
    die();
}
    
$_POST['motDePasse'] = md5($_POST['motDePasse']);


if(!isset($_POST['Photo'])) {
    $_POST['Photo'] = null;
}


$bdd = db_covidirect::getInstance();

$LocalRequest = $bdd->prepare("INSERT INTO utilisateurs(iduser, email, nom, prenom, pw, userlocation, userphoto) 
                        VALUES (null,:email,:xname,:fname,:mdp,:stat,:pdp)");


$LocalRequest->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$LocalRequest->bindValue(':fname', $tmp[0], PDO::PARAM_STR);
$LocalRequest->bindValue(':xname', $tmp[1], PDO::PARAM_STR);
$LocalRequest->bindValue(':mdp', $_POST['motDePasse'], PDO::PARAM_STR);
$LocalRequest->bindValue(':stat', $_POST['stat'], PDO::PARAM_INT);
$LocalRequest->bindValue(':pdp', $_POST['Photo'], PDO::PARAM_STR);

$LocalRequest->execute();
$LocalRequest->closeCursor();

?>
