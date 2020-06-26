<?php
    include("../essentials/header.php");
    session_destroy();
    echo '<script> document.location.replace("../mainpage/index.php"); </script>';
?>