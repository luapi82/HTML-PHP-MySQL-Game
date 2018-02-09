<?php
	$username = $_POST["username"];
	$password = $_POST["password"];
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
$query = $conn->query("SELECT * FROM users WHERE username='$username' and password='$password'");
if($query->rowCount()){
	if($query->rowCount() == 1){
	echo "<html>
	<head></head>
	<body>
	<h1>Warrior Wars</h1>
	Welcome ".$username."!<p>
	Soon you will be able to play this fantastic game! =)
	</body>
	</html>";
	exit();
	}
} else {
	echo "<p>Could not sign in. <a href='index.html'>Try again</a> or <a href='createUser.html'>Create new account</a>";
}

$conn = null;
 
?>