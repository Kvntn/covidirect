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
    foreach($this->listcomm as $rows => $key){
    echo '
        <div class="list-group-item list-group-item flex-column align-items-start text-left">
        <div class="inline"> 
        <h4><img class="img rounded-circle" src="../resources/images/thomas.jpg" style="max-width: 50px; height:50px;" alt="">', $key['iduser'] ,'</h4>
        </div>
        <p>', $key['textcomment'] ,'</p>
    </div>
        ';
        }
    }
}
?>