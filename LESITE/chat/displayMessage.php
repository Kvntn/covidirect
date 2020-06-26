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
			if(!isset($_SESSION['iduser2']))
				$_SESSION['iduser2'] = 1;

			if(($_SESSION['iduser'] == $x['idsender'] &&  $_SESSION['iduser2'] == $x['idreceiver'] ) || ($_SESSION['iduser2'] == $x['idsender'] &&  $_SESSION['iduser'] == $x['idreceiver'])) {

				if ($_SESSION['iduser'] == $x['idsender']) {
					echo '
					<div class="outgoing_msg">
						<div class="sent_msg">
							<p>',$x["message"],'</p>
							<span class="time_date">',$x["datemessage"],'</span> 
						</div>
					</div>
				';
				}
				else if ($_SESSION['iduser'] == $x['idreceiver']) {
					echo '
					<div class="incoming_msg">
						<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
							<div class="received_msg">
								<div class="received_withd_msg">
									<p>',$x["message"],'</p>
									<span class="time_date">',$x["datemessage"],'</span>
								</div>
							</div>
						</div>
					</div>
				';
				}
			}
		}
	}
}
?>
