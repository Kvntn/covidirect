<?php

//////////////////////////////////
//      update user info        //
//////////////////////////////////

try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

include "../essentials/header.php";


$bdd = db_covidirect::getInstance();

//unicité du mail dans la bdd
$requete = $bdd->prepare("SELECT * FROM users WHERE email=:email AND iduser!=:iduser");

$requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_INT);

$requete->execute();
$arr = $requete->fetchAll();
$requete->closeCursor();
if($arr != NULL) {
    echo '<script> alert(" email déjà existant");
    document.location.replace("../profile/profile.php"); </script>';
    die(); 
}

//Longueur du mots de passe
$nb_char = 6;


if (strlen($_POST['nvmdp']) < $nb_char) {
    echo "Mot de passe trop court !";
}

if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['nvmdp'])) {
    echo '';
} else {
    echo '<script> document.location.replace("../profile/profile.php"); </script>';
    die();
}	

$mdp = md5($_POST['ancienmdp']);

// if($mdp != $_SESSION['pw']){
//     echo ' <script> alert("Les mots de passe ne correspondent pas.");
//     document.location.replace("../profile/profile.php"); </script>';
//     die();
// }
    
$_POST['nvmdp'] = md5($_POST['nvmdp']);

$file = addslashes(file_get_contents($_FILES['image']['tmp_name']));  

if (empty($file)) {

    $file = fopen("../resources/images/egg.png", r);
    $file = addslashes(file_get_contents($file));  

}

$LocalRequest = $bdd->prepare("UPDATE users SET email=:email, nom=:xname, prenom=:fname, userlocation=:userloc, userphoto = :userpic, pw=:passw WHERE iduser=:iduser");


$LocalRequest->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$LocalRequest->bindValue(':xname', $_POST['nom'], PDO::PARAM_STR);
$LocalRequest->bindValue(':fname', $_POST['prenom'], PDO::PARAM_STR);
$LocalRequest->bindValue(':userloc', $_POST['userlocation'], PDO::PARAM_STR);
$LocalRequest->bindValue(':userpic', $file, PDO::PARAM_LOB);
$LocalRequest->bindValue(':passw', $_POST['nvmdp'], PDO::PARAM_STR);
$LocalRequest->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_INT);

$LocalRequest->execute();
$LocalRequest->closeCursor();


$requete = $bdd->prepare("SELECT * FROM users WHERE iduser=:iduser");

$requete->bindValue(':iduser', $_SESSION['iduser'], PDO::PARAM_STR);

$requete->execute();
$arr = $requete->fetchAll();
$requete->closeCursor();

if ($arr != NULL) {

    $_SESSION               = $arr[0];
    $_SESSION['login']      = true;
}

echo '<script> document.location.replace("../profile/profile.php"); </script>';
?>