<?php
    include("../essentials/header.php");
    session_destroy();
    header('Location: ../mainpage/index.php');
?>