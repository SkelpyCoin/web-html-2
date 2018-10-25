<?php

 // Escape user inputs for security
$email = mysqli_real_escape_string($mysqli, $_REQUEST['email']);

//Data connection to be filled
$server = "";
$username = "root";
$password = "";
$database = "";
$table = "";
$fieldsCheck = "";
$fieldsInsert = "";
$fields = "";

// Create connection
$conn = new mysqli($server, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    mysql_select_db($database);
}

$sql = "SELECT * FROM {$table} WHERE {$fieldsCheck}";
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result);

if($num_rows == 1){
  echo "You are alredy registered!";
}else{
  $sql = "INSERT INTO {$table} ($fields) ";
  $result = mysql_query($sql);
  if (!$result) {
    die('Invalid query: ' . mysql_error());
  }
}

?>
