
<?php
session_start();
?>


<script>
    var pseudo = <?php $_SESSION['iduser'] ?>; 
    var pseudo2 = <?php $_SESSION['iduser2'] ?>; 
    var message = <?php $message ?>
</script>

<script></script>

enlever les bouts de merde de l'autre hindou dans displayMessage 


Ceci est un card body cela constitue nos message.
<div class="card-body">
    This is some text within a card body.
</div>