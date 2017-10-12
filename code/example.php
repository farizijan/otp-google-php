<?php
	require_once('rfc6238.php');
	
	$secretkey = 'GEZDGNBVGY3TQOJQGEZDGNBVGY3TQOJQ';
	
	if(!empty($_POST['key'])){
		$currentcode = $_POST['key'];
		if (TokenAuth6238::verify($secretkey,$currentcode)) {
			echo "Code is valid\n";
		} else {
			echo "Invalid code\n\n\n";
			// print TokenAuth6238::getTokenCodeDebug($secretkey,0); 
		}
	} else {
		print sprintf('<img src="%s"/>',TokenAuth6238::getBarCodeUrl('fariz','test.com',$secretkey,'Fariz%20Test'));
		echo '
			<form method="post">
				<input name="key" type="text">
				<button type="submit">Validate Now!</button>
			</form>
		';
	}

