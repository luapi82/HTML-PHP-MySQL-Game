<?php
$email = $_POST["email"];
try {
	require 'connectToDB.php';
    $conn = Connect();
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
	die();
    }
$query = $conn->query("SELECT * FROM users WHERE email='$email'");
if($query->rowCount()){
	if($query->rowCount() == 1){
	$to      = '$email';
	$subject = 'Password Reset Request';
	$message = 'Hello, someone has requested a password reset from the Warrior Wars website, if this was not you please ignore this message.';
	$headers = 'From: webmaster@warriorwars.com';

	mail($to, $subject, $message, $headers);
	}
} else {
	echo "That email does not exist";
}

$conn = null;
 
?>