<?php

if (!isset($_SESSION)){
    session_start();
}


class Ad
{
	private $listad;

	function __construct($listad)
	{
		$this->listad=$listad;
	}
	
	public function display($listad){
    foreach($this->listad as $rows => $key){
		echo '
		<div class="col-md-6">
        <div class="card mb-6 box-shadow">
            <div class="card-header text-inline">
                <img src="../resources/images/',$key[],''" alt="..." class="img rounded-circle"> Thomas Lima
            </div>
        <div class="card-body">
            <div class="card-title">
                <h5>Aide voiture</h5>
            </div>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <div class="d-flex justify-content-between align-items-center">
                <p><small class="text-muted">Publier il y a : 9min   <br>  #Transport</small></p>
                </div>
            </div>
        </div>
    </div>';
		}
	}
}
?>
