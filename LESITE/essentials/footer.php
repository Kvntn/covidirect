<?php 
    include("header.php");
?>

<footer class="footer navbar-dark bg-dark fixed-bottom">
<?php
    if(isset($_SESSION['login']) && $_SESSION['login'] == true){
    echo'
    <a href="../profile/profile.php">
    <div class="text-inline">
        <img src="../resources/images/thomas.jpg" alt="..." class="img rounded-circle"> ',$_SESSION['nom'],' ',$_SESSION['prenom'],'
    </div>
    </a>';
    }

?>

</footer>

    