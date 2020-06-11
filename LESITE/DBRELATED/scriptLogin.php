<?php
if (!isset($_SESSION)){
    session_start();
}
try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

$bdd = db_covidirect::getInstance();

// md5 hash for password security (unidirectional since it is not an "encryption" and you cant "decrypt" it (unless you wanna waste all your lifetime))
$motDePasse = md5($_POST['password']); 

// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("SELECT iduser, email, nom, prenom, userlocation, userphoto FROM users WHERE email=:email AND pw=:motDePasse");

$requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':motDePasse', $motDePasse, PDO::PARAM_STR);

$requete->execute();
$arr = $requete->fetchAll();
$requete->closeCursor();


if ($arr != NULL) {

    $_SESSION                   = $arr[0];

    // if(isset($_COOKIE['accept_cookie']) && $_COOKIE['accept_cookie'] == true) {
    //     setcookie('firstname',$_SESSION['firstname'], time() + 24*3600, "/", null, false, true);
    //     setcookie('name', $_SESSION['name'], time() + 24*3600, "/", null, false, true);
    //     setcookie('ID',$_SESSION['IDUtilisateur'], time() + 24*3600, "/", null, false, true);
    // }

    header('Location: ../mainpage/index.php');

}else{
    echo '<h2>Utilisateur non trouvé !</h2>';
    session_destroy();
    header("Location: ./login.php");
}

?>