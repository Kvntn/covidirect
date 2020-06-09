<?php
    include("../essentials/header.php");
    include("../essentials/nav.php");
    include("../essentials/footer.php");
?>

<div class="container-login">

<div class="text-center">
    <form class="form-signin">
        <i class="fas fa-shield-virus mb-4"></i>
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
        <label>
        <input type="checkbox" value="remember-me"> Remember me
        </label>
        </div>
        <button class="btn btn-lg btn-secondary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 ">Pas encore inscrit ? Cliquez <a href="register.php">ici</a></p>
    </form>
</div>

</div>