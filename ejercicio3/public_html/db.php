<?php
    // Database credentials
    define('DB_SERVER', getenv('MYSQL_HOSTNAME'));
    define('DB_USERNAME', getenv('MYSQL_USERNAME'));
    define('DB_PASSWORD', getenv('MYSQL_PASSWORD'));
    define('DB_NAME', getenv('MYSQL_DATABASE'));
     
    // Attempt to connect
    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
     
    // Check connection
    if($mysqli->connect_errno) {
        die("ERROR: Could not connect to DB. " . mysqli_connect_error());
    }
?>