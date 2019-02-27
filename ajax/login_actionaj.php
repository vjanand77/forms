<?php

if($_POST['uname'] == 'a')
	{ 
		$msg = 'Successfully logged in';
		$result = true;
	}
else
	{ 
		$msg = "No email found";
		$result = false;
	}

echo json_encode( array('msg' => $msg, 'result' => $result) );exit;
?>