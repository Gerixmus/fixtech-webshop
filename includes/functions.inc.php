<?php

function emptyInputSignup($name, $surname, $email, $passwd) {
    $result = false;
    if (empty($name) || empty($surname) || empty($email) || empty($passwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emailTaken($conn, $email) {
    $sql = "SELECT * FROM user WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $surname, $email, $passwd) {
    $sql = "INSERT INTO user (privilege, name, surname, email, password, active) VALUES (0, ?, ?, ?, ?, 1);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPasswd = password_hash($passwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss",   $name, $surname, $email, $hashedPasswd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($email, $passwd) {
    $result = false;
    if (empty($email) || empty($passwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser ($conn, $email, $passwd) {
    $userExists = emailTaken($conn, $email);

    if ($userExists === false) {
        header("location: ../login.php?error=wronginfo");
        exit();
    }

    $active = $userExists["active"];

    if ($active!="1"){
        header("location: ../login.php?error=wronginfo");
        exit();
    }

    $passwdHashed = $userExists["password"];
    $checkPasswd = password_verify($passwd, $passwdHashed);

    if ($checkPasswd === false) {
        header("location: ../login.php?error=wronginfo");
        exit();
    }
    elseif ($checkPasswd === true) {
        session_start();
        $_SESSION["email"] = $userExists["email"];
        header("location: ../index.php");
        exit();
    }
}

function updateUser($conn, $privilege, $name, $surname, $email, $phone_no, $active, $user_id) {
    $sql = "UPDATE user SET privilege = ?, name = ?, surname = ?, email = ?, phone_no = ?, active = ? WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../users.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss",  $privilege, $name, $surname, $email, $phone_no, $active, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../users.php?error=none");
    exit();
}

function changePassword($conn, $password, $user_id) {
    $sql = "UPDATE user SET password = ? WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../users.php?error=stmtfailed");
        exit();
    }

    $hashedPasswd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss",   $hashedPasswd, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../users.php?error=none");
    exit();
}

function updateProduct($conn, $product_name, $category, $price, $manufacturer, $status, $product_id) {
    $sql = "UPDATE product SET product_name = ?, category = ?, price = ?, manufacturer = ?, status = ? WHERE product_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../products_admin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssss",  $product_name, $category, $price, $manufacturer, $status, $product_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../products_admin.php?error=none");
    exit();
}

function addProduct($conn, $product_name, $category, $price, $manufacturer, $status) {
    $sql = "INSERT INTO product (product_name, category, price, manufacturer, status) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../products_admin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss",  $product_name, $category, $price, $manufacturer, $status,);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../products_admin.php?error=none");
    exit();
}

function addOrder($conn, $user_id, $description, $total, $status, $date) {
    $sql = "INSERT INTO orders (user_id, description, total, status, date) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../checkout.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss",  $user_id, $description, $total, $status, $date,);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    echo'<script>alert("Operation Successfull! View your orders in orders tab.")</script>  
    <script>window.location.href = "../index.php";</script>';
    exit();
}

class ErrorLog {
    const ERROR_FILE = "includes/error.log";
    private $errno;
    private $errMsg;
    private $errFile;
    private $errLine;
    
    public function WriteError() {
    $error = "Error logged: " . date("Y-m-d H:i:s - ");
    $error .= "[ " . $this->errno . " ]: ";
    $error .= $this->errMsg;
    $error .= " in file " . $this->errFile;
    $error .= " on line " . $this->errLine ."\n";
    error_log($error, 3, self::ERROR_FILE);
    }
}
    

function handleUncaughtException($e){
    $log = new ErrorLog($e->getCode(), $e->getMessage(), 
                  $e->getFile(), $e->getLine());
    $log->WriteError();
    exit("An unexpected error occurred. Please contact the system 	  administrator!");
    }
set_exception_handler('handleUncaughtException');
    
