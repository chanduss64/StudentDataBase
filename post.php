<?php

	$db = mysqli_connect('localhost', 'root', '', 'sample');
	if (isset($_POST['push'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$aid = mysqli_real_escape_string($db, $_POST['aid']);
		$email = mysqli_real_escape_string($db, $_POST['email_1']);
		$email_2 = mysqli_real_escape_string($db, $_POST['email_2']);

		/*
		$pass = mysqli_real_escape_string($db, $_POST['pass_1']);
		$pass_2 = mysqli_real_escape_string($db, $_POST['pass_2']);
		$adr = mysqli_real_escape_string($db, $_POST['adr_1']);
		$city = mysqli_real_escape_string($db, $_POST['city']);
		$state = mysqli_real_escape_string($db, $_POST['state']);
		$zip = mysqli_real_escape_string($db, $_POST['zipcode']);*/


		$query = "INSERT INTO god (username,aid,email) VALUES('$username', '$aid', '$email')";
		//$query = "INSERT INTO test (username,pass) VALUES('$username', '$pass')";
		

			mysqli_query($db, $query);
	}


?>	