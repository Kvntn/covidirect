$(document).on('submit', '.favourite-form', function(e) { 
    e.preventDefault(); //prevent a normal postback and allow ajax to run instead
    var data = $(this).serialize(); //"this" represents the form element in this context
    $.ajax({ 
      data: data, 
      type: "post", 
      url: "../profile/fav.php", 
      success: function(data) { 
        // $("#star").html('<img/>',{"src": data.fav==yes ? "true.png" : "false.png"}); 
      },
      error: function(jqXHR, textStatus, errorThrown) //gracefully handle any errors in the UI
      {
        alert("An ajax error occurred: " + textStatus + " : " + errorThrown);
      }
    }); 
  }); 

// $(function() {
//     $(".favorite").on("click", function() {
//       $.post("../profile/fav.php", {"favorite_row":this.id}, function(data) {
//         let src: data.fave == yes "?" true.png":"false.png";
        // $("#star").html('<img/>',{"src": data.fave==yes?"true.png":"false.png"});
//      }); 
//   });