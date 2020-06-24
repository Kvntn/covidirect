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
    foreach($this->listad as $rows => $key){
        
        if (isset($key['prenom'])){
        echo '<div class="col-md-6">';
        }
        echo '
        <a href="../mainpage/singleAd.php?id=', $key['idad'] ,'">     
            <div class="card mb-6 box-shadow" style="margin-bottom:20px">
                <div class="card-header text-inline">
                    <img src="../resources/images/" alt="..." class="img rounded-circle">', $key['nom'], ' ', $key['prenom'], '
                </div>
            <div class="card-body">
                <div class="card-title">
                    <h5>', $key['title'],'</h5>
                </div>
                <p class="card-text">',$key['descriptionad'],'</p>
                <div class="d-flex justify-content-between align-items-center">
                    <p><small class="text-muted">Postée le ', $key['datead'],'<br>  #',$key['typead'],'</small></p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <p><i class="far fa-star"></i></p>
                </div>
            </div>
            </div>
        </a>
        ';

        if (isset($key['prenom'])){
            echo '</div>';
        }

		}
	}
}
?>
