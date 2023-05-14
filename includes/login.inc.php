<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $passwd = $_POST["passwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($email, $passwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $email, $passwd);
}
else {
    header("location: ../login.php");
    exit();
}