<?php

session_start();

  // variable declaration
  $fname = "";
  $email_1  = "";
  $errors = array(); 
  $_SESSION['success'] = "";

  // connect to database
  $db = mysqli_connect('localhost', 'root', '', 'register');

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


// REGISTER USER
if (isset($_POST['register_BTN'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $uname = mysqli_real_escape_string($db, $_POST['uname']);
  $aid = mysqli_real_escape_string($db, $_POST['aid']);
  $email_1 = mysqli_real_escape_string($db, $_POST['email_1']);
  $email_2 = mysqli_real_escape_string($db, $_POST['email_2']);
  $pass_1 = mysqli_real_escape_string($db, $_POST['pass_1']);
  $pass_2 = mysqli_real_escape_string($db, $_POST['pass_2']);
  $adr_1 = mysqli_real_escape_string($db, $_POST['adr_1']);
  $adr_2 = mysqli_real_escape_string($db, $_POST['adr_2']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $zipcode = mysqli_real_escape_string($db, $_POST['zip_code']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fname)) { array_push($errors, "<li>First name is required</li>"); }
  if (empty($aid)) { array_push($errors, "<li>Aadhar Card Number is required</li>"); }
  if (empty($uname)) { array_push($errors, "<li>Username is required</li>"); }
  if (empty($email_1)) { array_push($errors, "<li>Email is required</li>"); }
  if (empty($email_2)) { array_push($errors, "<li>Confirmation Email  is required</li>"); }
   if ($email_1 != $email_2) {
  array_push($errors, "The Emails do not match");
  }

  if (empty($pass_1)) { array_push($errors, "Password is required"); }
  if (empty($pass_2)) { array_push($errors, "Confirmation Password is required"); }
  if ($pass_1 != $pass_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE uname='$uname' OR email_1='$email_1' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['uname'] === $uname) {
      array_push($errors, "Username already exists");
    }

    if ($user['email_1'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$enc_pass = md5($pass_1);//encrypt the password before saving in the database


  $query = "INSERT INTO users (fname, uname, aid, email_1, email_2, enc_pass,   pass_2, adr_1, adr_2, city, state, zipcode) VALUES('$fname', '$uname', 'aid', 'email_1', '$email_2', '$pass_1', '$pass_2', '$adr_1', '$adr_2', '$city', '$state', '$zipcode')";

    mysqli_query($db, $query);
  	

    echo "sent";
  	$_SESSION['uname'] = $uname;
  	$_SESSION['success'] = "You are now logged in";
  	//header('location: profile.php');
  }
/*
  if (mysqli_query($db, $query)) {
    echo "New record created successfully";
} else {
   // echo "Error: " . $query . "<br>" . mysqli_error($query);
   echo "Error: " . $query . "<br>" ;
}*/




}

// ... 
