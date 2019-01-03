<?php

	//Data connection to be filled
	$server = "";
	$username = "";
	$password = "";
	$database = "";
	$table = "";

	// Create connection
	$mysqli = new mysqli($server, $username, $password, $database);

	// check connection
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	 // Escape user inputs for security
	$email = mysqli_real_escape_string($mysqli, $_REQUEST['email']);
	if ($email != ""){
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {	

		$sql = "SELECT * FROM {$table} WHERE email = '{$email}'";
		$result = mysqli_query($mysqli,$sql);
		$num_rows = intval(mysqli_num_rows($result));

		if($num_rows > 0){

			echo "You are alredy registered!";

		}else{

			$sql = "INSERT INTO {$table} (email) values('{$email}') ";
			$result = mysqli_query($mysqli,$sql);
			if (!$result) {
				die('Invalid query: ' . mysqli_error());
			}else{
				echo "Congratulations now you are part of our big family. Welcome!";
			}

		}
	} else {

		 echo "Email address '$email' is considered invalid.\n";

	}
	}else{

		echo "The field is void... Are you kidding me?";

	}

?>
