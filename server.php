<?php 
	session_start();

	// variable declaration
	//$username = "";
	//$email    = "";
	$errors = array(); 
	$error_login_s = array(); 
	$error_login_f = array(); 
	$success = array(); 
	//$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'student');

	// REGISTER USER
	if (isset($_POST['push'])) {
		// receive all input values from the form
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$aid = mysqli_real_escape_string($db, $_POST['aid']);
		$email_1 = mysqli_real_escape_string($db, $_POST['email_1']);
		$email_2 = mysqli_real_escape_string($db, $_POST['email_2']);
		$pass_1 = mysqli_real_escape_string($db, $_POST['pass_1']);
		$pass_2 = mysqli_real_escape_string($db, $_POST['pass_2']);
		$adr_1 = mysqli_real_escape_string($db, $_POST['adr_1']);
		$adr_2 = mysqli_real_escape_string($db, $_POST['adr_2']);
		$city = mysqli_real_escape_string($db, $_POST['city']);
		$state = mysqli_real_escape_string($db, $_POST['state']);
		$zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
		
		$aid_check = floor(log10($aid) + 1); // check for Length of Aadhaar Count 
		$zip_check = floor(log10($zipcode) + 1); // check for Length of ZipCode Count 
		

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email_1)) { array_push($errors, "Email is required"); }
		if (empty($pass_1)) { array_push($errors, "Password is required"); }

		if (empty($city)) { array_push($errors, "City is required"); }
		if (empty($state)) { array_push($errors, "State is required"); }
		if (empty($zipcode)) { array_push($errors, "Zipcode is required"); }

		if ($pass_1 != $pass_2) {
			array_push($errors, "The two passwords do not match");
		}

		if ($email_1 != $email_2) {
			array_push($errors, "The two emails do not match");
		}

		if($aid_check < 12){array_push($errors, "Aadhaar number Cannot be less than 12 Digits");}
		
		if($zip_check < 6){array_push($errors, "ZipCode Cannot be less than 6 Digits");}



		$user_check_query = "SELECT * FROM register WHERE username='$username' OR email='$email_1' LIMIT 1";
		  $result = mysqli_query($db, $user_check_query);
		  $user = mysqli_fetch_assoc($result);
		  
		  if ($user) { // if user exists
		    if ($user['username'] === $username) {
		      array_push($errors, "<strong>Username</strong> already exists");
		    }

		    if ($user['email'] === $email_1) {
		      array_push($errors, "<strong>Email</strong> already exists");
		    }

		    if ($user['aid'] === $aid) {
		      array_push($errors, "<strong>Aadhaar Number</strong> already exists");
		    }

		    


		  }

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($pass_1);
			

			//$query = "INSERT INTO register (username, aid, email, pass, adr, city, state, zip) VALUES('$username', '$aid', '$email_1', '$password', '$adr_1', '$city', '$state', '$zipcode')";
			$query = "INSERT INTO register (username,aid,email,pass,adr,city,state,zip,name) VALUES('$username','$aid','$email_1','$password','$adr_1', '$city', '$state', '$zipcode', '$name')";

			mysqli_query($db, $query);

			
			array_push($success, $username);

		}
		

	}

	// STUDENT LOGIN USER
	if (isset($_POST['cs_std_login'])) {
		$username_s = mysqli_real_escape_string($db, $_POST['username_s']);
		$password_s = mysqli_real_escape_string($db, $_POST['pass_s']);

		if (empty($username_s)) {
			array_push($error_login_s, "Username is required");
		}
		if (empty($password_s)) {
			array_push($error_login_s, "Password is required");
		}

		if (count($error_login_s) == 0) {
			//$password_s = md5($password_s);
			$query = "SELECT * FROM student WHERE username='$username_s' AND pass='$password_s'";
			$results = mysqli_query($db, $query);

			//$get_aid = "SELECT aid FROM register WHERE username='$username' AND pass='$password'";
			//$results_aid = mysqli_query($db, $get_aid);



			if (mysqli_num_rows($results) == 1) {
				//session_start();
				$_SESSION['username_std'] = $username_s;
				//$_SESSION['aid'] = strval($results_aid);
				
				//$_SESSION['success'] = "You are now logged in";
				header('location: profile_view.php');
				
			}else {
				array_push($error_login_s, "Wrong username/password combination");
			}
		}
	}




	// FACULTY LOGIN USER
	if (isset($_POST['cs_fac_login'])) {
		$username_f = mysqli_real_escape_string($db, $_POST['username_f']);
		$password_f = mysqli_real_escape_string($db, $_POST['pass_f']);

		if (empty($username_f)) {
			array_push($error_login_f, "Username is required");
		}
		if (empty($password_f)) {
			array_push($error_login_f, "Password is required");
		}

		if (count($error_login_f) == 0) {
			//$password_f = md5($password_f);
			$query = "SELECT * FROM faculty WHERE username='$username_f' AND pass='$password_f'";
			$results = mysqli_query($db, $query);


			if (mysqli_num_rows($results) == 1) {
				//session_start();
				$_SESSION['username_fac'] = $username_f;
				//$_SESSION['aid'] = strval($results_aid);
				
				//$_SESSION['success'] = "You are now logged in";
				header('location: profile_view.php');
				
			}else {
				array_push($error_login_f, "Wrong username/password combination");
			}
		}
	}



                

	

?>