<?php

if (!isset($_SESSION)){
    session_start();
};



class Contact
{
	private $listContact;

	function __construct($listContact)
	{
		$this->listContact=$listContact;
	}

	public function display($listContact) {

		if(!isset($_GET['nom'])) {
			$_GET['nom'] = "false";
			$_GET['prenom'] = "false";
		}

		foreach($listContact as $arr => $x) {
			
			if($_SESSION['prenom'] == $x['prenom'] && $_SESSION['nom'] == $x['nom']) {}

			else if ($_GET['nom'] == $x['nom'] && $_GET['prenom'] == $x['prenom']) {

				$_SESSION['iduser2'] = $x['iduser'];
				$_SESSION['prenom2'] = $x['prenom'];

				echo `<script>
					var ids = <?php \$_SESSION['iduser'] ?>; 
					var idr = <?php \$_SESSION['iduser2'] ?>; 
				</script>`;

				echo'
						<div class="chat_list active_chat">
							<div class="chat_people">
								<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
									<div class="chat_ib">
									<h5>',$x['prenom'],' ', $x['nom'],'</h5>
								</div>
							</div>
						</div>
				';
				}
			else {
				echo'
				<a href="../chat/chat.php?nom=',$x['nom'],'&prenom=',$x['prenom'],'" >
				<div class="chat_list ">
						<div class="chat_people">
							<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
								<div class="chat_ib">
								<h5>',$x['prenom'],' ', $x['nom'],'</h5>
							</div>
						</div>
					</div>
				</a>';
			}
		}
	}
}

?>