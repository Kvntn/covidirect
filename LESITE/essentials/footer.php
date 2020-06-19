<?php 
    include("header.php");
?>

<footer class="footer navbar-dark bg-dark fixed-bottom">
<?php
    if(isset($_SESSION['login']) && $_SESSION['login'] == true){
    echo'
    <a href="profile.php">
    <div class="card-header text-inline">
        <img src="../resources/images/thomas.jpg" alt="..." class="img rounded-circle"> Thomas Lima
    </div>
    </a>';
    }

?>

</footer>

    