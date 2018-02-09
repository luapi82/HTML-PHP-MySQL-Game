<?php
$servername = "webroot";
$username = "root";
$password = "";
$databasename = "game";

try {
    $conn = new PDO("mysql:host=$servername;", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DROP DATABASE $databasename";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database '$databasename' deleted successfully<p>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage() . "<p>";
    }
	
try {
    $conn = new PDO("mysql:host=$servername;", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE $databasename";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database '$databasename' created successfully<p>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage() . "<p>";
    }

try {
    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(30) NOT NULL UNIQUE,
	email VARCHAR(50) NOT NULL UNIQUE,
	password VARCHAR(30) NOT NULL,
	dateCreated datetime NOT NULL DEFAULT NOW()
    );
	CREATE TABLE characters (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	characterName VARCHAR(30) NOT NULL UNIQUE,
	currentLevel INT DEFAULT 0,
	hp INT DEFAULT 5,
	gold INT DEFAULT 0,
	experience INT DEFAULT 0)";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table 'users' created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;
//header("Location: index.html");	
 echo "Return to <a href='../index.html'>main page</a><p>";
?>