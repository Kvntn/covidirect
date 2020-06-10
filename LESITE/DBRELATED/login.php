<?php
    include("../essentials/header.php");
    include("../essentials/nav.php");
    include("../essentials/footer.php");
?>

<div class="container-login">

<div class="text-center">
    <form class="form-signin" method="POST" action="scriptConnexion.php">
        <i class="fas fa-shield-virus mb-4"></i>
        <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="adresse email" required="required">
        <label for="inputPassword" class="sr-only"></label>
        <input type="password" name=pw class="form-control" placeholder="Password" required="required">
        <div class="checkbox mb-3">
        <label>
        <input type="checkbox" value="remember-me"> Se rappeller de moi
        </label>
        </div>
        <button class="btn btn-lg btn-secondary btn-block" type="submit">Se connecter</button>
    </form>

    <p class="mt-5 mb-3 ">Pas encore inscrit ? Cliquez <a href="register.php">ici</a></p>

</div>

</div>