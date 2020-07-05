<?php

if (!isset($_SESSION)){
    session_start();
}


class Comment
{
	private $listcomm;

	function __construct($listcomm)
	{
		$this->listcomm=$listcomm;
    }

	public function display($listcomm){
        if ($listcomm == null){
            echo 'Aucun commentaire.';
        }
    foreach($this->listcomm as $rows => $key){
          echo '
        <div class="list-group-item list-group-item flex-column align-items-start text-left">
        <div class="inline"> 
        <h4><img class="img rounded-circle" src="data:userphoto/jpeg;base64,'.base64_encode(stripslashes($key['userphoto'])).'" style="max-width: 50px; height:50px;" alt="">', $key['nom'], ' ', $key['prenom']  ,'</h4>
        </div>
        <p>', $key['textcomment'] ,'</p>
        <p><small class="text-muted">Posté le ', $key['datecomment'],' </small></p>
        </div>
        ';

        }
    }
}
?>