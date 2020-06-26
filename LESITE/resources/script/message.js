

$('#envoi').on('click', function(e){
    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

    var message = encodeURIComponent( $('#message').val() );
    alert("YOU MOTHERFXCKER");
    if(trim(message) != ""){ 
        $.ajax({
            url: "sendMessage.php",
            type: "POST",
            data: "message=" + message,
            success: (html, statut) => {
                $('#messages').append("<p>" + pseudo + " dit : " + message + "</p>"); // on ajoute le message dans la zone prévue
            },
            error: (html, statut) => {
                alert('Messsage non envoyé');
            }
        });

       $('#messages').append("<p>" + pseudo + " dit : " + message + "</p>"); // on ajoute le message dans la zone prévue
    }
});


