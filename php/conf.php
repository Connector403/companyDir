<?php

$servername = "localost";
$username = "username";
$password = "password";

// Create a connection
$conn = new mysqli($servername, $username, $password);

// check connection
if($conn->connect_error){
	die("Connectiopn failed: " . $conn->connect_error);
}

$echo "Connected Successfully";
?>