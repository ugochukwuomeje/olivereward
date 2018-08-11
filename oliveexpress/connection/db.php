<?php

DEFINE('SERVERNAME', 'localhost');
DEFINE('PASSWORD', 'ugochukwu');
DEFINE('USERNAME', 'ugochukwu');
DEFINE('DB', 'oliveexpress');

// Create connection
$con = new mysqli(SERVERNAME, USERNAME, PASSWORD, DB);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 





?>