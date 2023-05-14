<?php

$serverName = "localhost";
$dbEmail = "Webuser";
$dbPassword = "Lab2021";
$dbName = "fixtech";

$conn = mysqli_connect($serverName, $dbEmail, $dbPassword, $dbName);

if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}