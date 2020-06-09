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
<form>
	<div class="form-row">
		<div class="col form-group">
			<label>Prénom </label>   
		  	<input type="text" class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
			<label>Nom</label>
		  	<input type="text" class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<div class="form-group">
		<label>Adresse Email</label>
		<input type="email" class="form-control" placeholder="">
		<small class="form-text text-muted">Nous ne partagerons ce mail avec personne d'autre</small>
	</div> <!-- form-group end.// -->
	
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>Département</label>
		  <input type="text" class="form-control">
        </div> <!-- form-group end.// -->
        
		<div class="form-group col-md-6">
		  <label>Photo de profil</label>
		  <input type="file" class="form-control-file">
		    
          </input>
        </div> <!-- form-group end.// -->
        
    </div> <!-- form-row.// -->
    
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>Mots de passe</label>
		  <input type="password" class="form-control">
        </div> <!-- form-group end.// -->
        
		<div class="form-group col-md-6">
		  <label>Confirmer le mots de passe</label>
		  <input type="password" class="form-control">
        </div> <!-- form-group end.// -->    
    </div> <!-- form-row.// -->
    
    <div class="form-row">
        <button type="submit" class="btn btn-secondary">S'inscrire</button>
    </div>


</div> 
<!--container end.//-->
