<?php

if (!isset($_SESSION)){
    session_start();
}


class Ads
{
	private $listad;

	function __construct($listad)
	{
		$this->listad=$listad;
	}


	public function display($listad){

        if ($listad == null){
            echo '<p style="text-align:center;">Aucun résultat ne correspond à votre recherche.</p>';
        }

        foreach($this->listad as $rows => $key) {

            if (!isset($key['nom']) || !isset($key['prenom'])) {
                $key['nom'] = $_SESSION['nom_displayad'];
                $key['prenom']= $_SESSION['prenom_displayad'];
            }

            if($_SESSION['iduser']) {

            }

            if($key['statut'] == 0){
                $statut = " demande de l'aide.";
            }
            else if($key['statut'] == 1) {
                $statut = " propose d'aider.";
            }

            if (isset($key['prenom'])){
                echo '<div class="col-md-6">';
            }

            echo '
            <a href="../mainpage/singleAd.php?id=', $key['idad'] ,'" style="text-decoration:none;">     
                <div class="card mb-6 box-shadow" style="margin-bottom:20px">
                    <div class="card-header text-inline">
                        <img src="data:userphoto/jpeg;base64,'.base64_encode(stripslashes($key['userphoto'])).'" alt="..." class="img rounded-circle">', $key['nom'], ' ', $key['prenom'], $statut,'
                    </div>
                    </a>
                <div class="card-body">
                    <div class="card-title">
                        <h5>', $key['title'],'</h5>
                    </div>
                    <p class="card-text">',$key['descriptionad'],'</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p><small class="text-muted">Postée le ', $key['datead'],'<br>  #',$key['typead'],'</small></p>
                        <p><small class="text-muted"> Département : ', $key['adlocation'],'</small></p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    </div>
                </div>
                </div>
            ';

            if (isset($key['prenom'])){
                echo '</div>';
            }

            }
	}
}
?>
