<?php
 
try {
	require 'connectToDB.php';
    $conn = Connect();
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO users (username, email, password)
    VALUES ('".$_POST['username']."','".$_POST['email']."','".$_POST["password"]."')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully<p>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
	//header("Location: createUser.html");
    }

$conn = null;
//header("Location: index.html");
?>