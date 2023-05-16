<?php

$serverName = "localhost";
$dbEmail = "user";
$dbPassword = "user";
$dbName = "fixtech";

$conn = mysqli_connect($serverName, $dbEmail, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
