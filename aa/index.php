
<?php 



	$simple_string = ""; 

	// Display the original string 
	//echo "Original String: " . $simple_string ; 

	// Store the cipher method 
	$ciphering = "AES-128-CTR"; 

	// Use OpenSSl Encryption method 
	$iv_length = openssl_cipher_iv_length($ciphering); 
	$options = 0; 

	// Non-NULL Initialization Vector for encryption 
	$encryption_iv = '1234567891012345'; 

	// Store the encryption key 
	$encryption_key = "csm"; 

	$encryption = "";
	$decryption = "";

	// Non-NULL Initialization Vector for decryption 
$decryption_iv = '1234567891012345'; 

// Store the decryption key 
$decryption_key = "csm"; 

	if(isset($_POST['enc'])){

		$cnt = $_POST['content'];
		$simple_string = $cnt; 

	//echo $cnt;

	// Store a string into the variable which 
	// need to be Encrypted 
	

	// Use openssl_encrypt() function to encrypt the data 
	$encryption = openssl_encrypt($simple_string, $ciphering, 
				$encryption_key, $options, $encryption_iv); 

	// Display the encrypted string 
	//echo "Encrypted String: " . $encryption . "\n"; 

	}

	//$aa = $encryption;
	//setcookie('aa', $encryption);



	if(isset($_POST['dec'])){
	//$abc = $_COOKIE['aa'];
		$cnt = $_POST['content'];
		$simple_string = $cnt; 

// Use openssl_decrypt() function to decrypt the data 
$decryption=openssl_decrypt ($cnt, $ciphering, 
		$decryption_key, $options, $decryption_iv); 

// Display the decrypted string 
//echo "Decrypted String: " . $decryption; 

//setcookie('ba', $decryption);

}

//echo $decryption;



?> 

<!DOCTYPE html>
<html>
<head>
	<title> 6777 </title>

	<style type="text/css">
			


	</style>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</head>
<body>


<div class="container text-center">
	<br />


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

	
	<!-- <input type="textbox" name="content" size="50" class="content" value="HI"> -->
	<textarea id="foo" class="form-control" rows="10" name="content"><?php if(isset($_POST['enc'])){echo $encryption;}else{echo $decryption;} ?></textarea><br />
	<input type="submit" name="enc" class="btn btn-primary btn-lg" value="encrypt">
	<input type="submit" name="dec" class="btn btn-warning btn-lg" value="decrypt">
	<input type="submit" class="btn btn-success btn-lg" value="Copy"  data-clipboard-target="#foo">


	

</form>

</div> <!-- ./ container -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>

<script type="text/javascript">
	
	new ClipboardJS('.btn');
</script>

</body>
</html>



