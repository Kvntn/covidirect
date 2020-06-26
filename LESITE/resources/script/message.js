
$('#envoi').click(function(e){
    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

    var message = encodeURIComponent( $('#message').val() );
    alert("YOU MOTHERFUCKER");
    if(message != ""){ 
        $.ajax({
            url : "sendMessage.php", 
            type : "POST", 
            data : "message=" + message
        });

       $('#messages').append("<p>" + pseudo + " dit : " + message + "</p>"); // on ajoute le message dans la zone prévue
    }
});


