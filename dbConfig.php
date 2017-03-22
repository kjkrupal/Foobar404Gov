<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'government';


$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}

?>