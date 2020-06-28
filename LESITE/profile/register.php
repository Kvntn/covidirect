<?php
    include("../essentials/header.php");
    include("../essentials/nav.php");
    include("../essentials/footer.php");
?>

<div class="container-register container">



<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<article class="card-body">
        <h1 class="h3 mb-3 font-weight-normal"><i class="fas fa-shield-virus mb-4"></i> Veuillez vous enregistrer</h1>
<form method="POST" action="../DBRELATED/scriptRegister.php" enctype="multipart/form-data" >
	<div class="form-row">
		<div class="col form-group">
			<label>Prénom </label>   
		  	<input type="text" required="required" name="prenom" class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
			<label>Nom</label>
		  	<input type="text" required="required" name="nom" class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<div class="form-group">
		<label>Adresse mail</label>
		<input type="email" required="required" name="email" class="form-control" placeholder="">
		<small class="form-text text-muted">Nous ne partagerons cette adresse mail avec personne d'autre.</small>
	</div> <!-- form-group end.// -->
	
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>Département</label>
		  <input type="text" required="required" name="userlocation" class="form-control" placeholder="Ex : 78">
        </div> <!-- form-group end.// -->
        
		<div class="form-group col-md-6">
		  <label>Photo de profil</label>
		  <input type="file" name="image" id="image" class="form-control-file">
          </input>
        </div> <!-- form-group end.// -->
        
    </div> <!-- form-row.// -->
    
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>Mots de passe</label>
		  <input type="password" required="required" name="password" class="form-control">
        </div> <!-- form-group end.// -->
        
		<div class="form-group col-md-6">
		  <label>Confirmer le mots de passe</label>
		  <input type="password" required="required" name="pwtest" class="form-control">
        </div> <!-- form-group end.// -->    
		<small class="form-text text-muted">Votre mot de passe doit contenir une majuscule, une minuscule, un chiffre et un caractère spécial.</small>
    </div> <!-- form-row.// -->
    <br>
    <p class="signin button">
    	<input name="insert" id="insert" type="submit" class="btn btn-secondary"value="S'inscrire"/>
    </p>
</form>

</div> 
<!--container end.//-->
<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
			var extension = $('#image').val().split('.').pop().toLowerCase();  
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
			{  
					alert("Format d'image invalide.");  
					$('#image').val('');  
					return false;  
			}  
      });  
 });  
 </script>  
 