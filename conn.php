
<?php

// Create connection
$conn = new mysqli('localhost', 'root', '', 'genral_labs');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
