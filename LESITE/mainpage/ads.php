<?php
    include("../essentials/header.php");
    include("../essentials/nav.php");
    include("../essentials/footer.php");
?>

<div class="container-ads container">



<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<article class="card-body">
        <h1 class="h3 mb-3 font-weight-normal"><i class="fas fa-shield-virus mb-4"></i>     Poster une annonce</h1>
<form method="POST" action="../DBRELATED/scriptAds.php">

	<div class="form-row">
		<div class="col form-group">
			<label>Tire de l'annonce</label>   
		  	<input type="text" required="required" name="title" class="form-control" placeholder="" required>
		</div> <!-- form-group end.// -->
		

	</div> <!-- form-row end.// -->

    <div class="form-row">
        <div class="col form-group">
            <label for="exampleFormControlSelect1">Votre situation</label>
            <select name="statut" class="form-control" id="exampleFormControlSelect1" required>
            <option value=0>Je demande de l'aide</option>
            <option value=1>Je propose de l'aide</option>
            </select>
        </div>
        <div class="col form-group">
            <label for="exampleFormControlSelect1">Type de l'annonce</label>
            <select name="typead" class="form-control" required>
            <option value="Service">Service</option>
            <option value="Transport">Transport</option>
            <option value="Materiel">Matériel</option>
            <option value="Hebergement">Hébergement</option>
            <option value="Autre">Autre</option>
            </select>
        </div>
    </div>
	
	<div class="">
    <label for="exampleFormControlTextarea1">Description de l'annonce</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="descriptionad" rows="3" required></textarea>
    </div>
    <br>
    <p class="signin button">
    	<input type="submit" class="btn btn-secondary"value="Publier"/>
    </p>
</form>

</div> 
<!--container end.//-->
