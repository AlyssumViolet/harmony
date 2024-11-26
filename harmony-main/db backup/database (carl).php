<?php

$host = "localhost";
$dbname = "harmony_db";
$username = "harmony";
$password = "FVBxQ#w5q@A";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;