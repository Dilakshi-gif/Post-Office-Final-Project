<?php
// Database host (usually 'localhost' or an IP address)
define('DB_HOST', 'localhost');

// Database username
define('DB_USER', 'root');

// Database password
define('DB_PASSWORD', 'CHA#11#tharu');

// Database name
define('DB_NAME', 'post-office1');

// Create a database connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check for a successful connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
