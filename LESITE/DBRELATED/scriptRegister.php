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


if (strlen($_POST['password']) < $nb_char) {
    echo "Mot de passe trop court !";
}

if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['password'])) {
    echo 'Mot de passe conforme';
} else {
    echo '<script> document.location.replace("register.php"); </script>';
    die();
}	



if($_POST['pwtest'] != $_POST['password']){
    echo "<h1>Les mots de passe ne correspondent pas</h1>";
    echo '<script> document.location.replace("register.php"); </script>';
    die();
}
    
$_POST['password'] = md5($_POST['password']);

$bdd = db_covidirect::getInstance();

$LocalRequest = $bdd->prepare("INSERT INTO users(email, nom, prenom, userlocation, userphoto, pw) 
                        VALUES (:email,:xname,:fname,:userloc,:userpic,:passw)");


$LocalRequest->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$LocalRequest->bindValue(':xname', $_POST['nom'], PDO::PARAM_STR);
$LocalRequest->bindValue(':fname', $_POST['prenom'], PDO::PARAM_STR);
$LocalRequest->bindValue(':userloc', $_POST['userlocation'], PDO::PARAM_STR);
$LocalRequest->bindValue(':userpic', $_POST['userphoto'], PDO::PARAM_INT);
$LocalRequest->bindValue(':passw', $_POST['password'], PDO::PARAM_STR);

$LocalRequest->execute();
$LocalRequest->closeCursor();

?>
