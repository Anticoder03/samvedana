
<?php

$servername = "sql5.freesqldatabase.com";
$username = "sql5759816";
$password = "ABbGyugrHd";
$dbname = "sql5759816";
$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
