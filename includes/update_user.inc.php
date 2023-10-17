<?php

if (isset($_POST["submit"])) {
    $user_id = $_POST["user_id"];
    $privilege = $_POST["privilege"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $phone_no = $_POST["phone_no"];
    $active = $_POST['active'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // if (emptyInputSignup($name, $surname, $email, $password) !== false) {
    //     header("location: ../signup.php?error=emptyinput");
    //     exit();
    // }
    if (invalidEmail($email) !== false) {
        header("location: ../users.php?error=invalidemail");
        exit();
    }

    updateUser($conn, $privilege, $name, $surname, $email, $phone_no, $active, $user_id);
} else {
    header("location: ../users.php");
    exit();
}
