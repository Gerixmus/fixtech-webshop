<?php

if (isset($_POST["submit"])) {
    $user_id = $_POST["user_id"];
    $password = $_POST["password"];    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    changePassword ($conn, $password, $user_id);
}
else {
    header("location: ../users.php");
    exit();
}