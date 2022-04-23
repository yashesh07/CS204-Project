<?php

// Username is root
$user = 'root';
$password = '';

// Database name is gfg
$database = 'railway system';

// Server is localhost with
// port number 3307
$servername='localhost:3307';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = "SELECT * FROM payment ORDER BY amount DESC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>