<?php
    include("LESITE/essentials/header.php");
?>
<br><br><br>

<input type = "button" value = "fav" onclick = "fav()" id=fav />
<input type = "text" value = "0" id = "output" />

<script>

function fav() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'like.php', true);
        // form data is sent appropriately as a POST request
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
          if(xhr.readyState == 4 && xhr.status == 200) {
            var result = xhr.responseText;
            console.log('Result: ' + result);
          }
        };
        xhr.send();

        var buttons = document.getElementsByClassName("fav");
      for(i=0; i < buttons.length; i++) {
        buttons.item(i).addEventListener("click", likeButton);
      }
      }

</script>