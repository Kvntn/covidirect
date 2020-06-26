<?php

if (!isset($_SESSION)){
    session_start();
}


class Message
{
	private $listmsg;

	function __construct($listmsg)
	{
		$this->listmsg=$listmsg;
	}


	public function display($listmsg){

    	foreach($listmsg as $rows => $x){
			if(!isset($_SESSION['iduser2'])) {
				$_SESSION['iduser2'] = 1;
				$_SESSION['prenom2'] = 'Lui';
			}
				

			if(($_SESSION['iduser'] == $x['idsender'] &&  $_SESSION['iduser2'] == $x['idreceiver'] ) || ($_SESSION['iduser2'] == $x['idsender'] &&  $_SESSION['iduser'] == $x['idreceiver'])) {

				if ($_SESSION['iduser'] == $x['idsender']) {
					echo '
					<li class="list-group-item">Moi : ',$x['message'],'</li>
					<small class="text-muted datedis">',$x["datemessage"],'</small>
				';
				}
				else if ($_SESSION['iduser'] == $x['idreceiver']) {
					echo '
					<li class="list-group-item">', $_SESSION['prenom2'],' : ',$x['message'],'</li>
					<small class="text-muted datedis">',$x["datemessage"],'</small>
				';
				}
			}
		}
	}
}
?>
