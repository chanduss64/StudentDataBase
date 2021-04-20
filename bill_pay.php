<?php 


	$db = mysqli_connect('localhost', 'root', '', 'sample');
	if (isset($_POST['bill_pay'])) {
		$query = "REPLACE INTO bills (house) VALUES('$amount')";

			mysqli_query($db, $query);

	}


?>