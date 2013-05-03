<?php

	require 'conf.php';
	$user = $facebook->getUser();

	if (isset($_POST['message_fb'])) {

		if ($user){

			$message = $_POST['message_fb'];
			$parametrosFB = array('message' => $message);

			$isPost = $facebook->api('/me/feed', 'post', $parametrosFB);

          	if ($isPost) { echo "true"; } else { echo "false"; }
		}
		else{
			echo "Access token no valido!";
		}
	}

?>