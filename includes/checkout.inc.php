<?php
session_start();

if (isset($_POST["submit"])) {
    $user_id = $_POST['user_id'];
    $description = $_POST['description'];
    $total = $_POST['total'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    unset($_SESSION["shopping_cart"]);

    addOrder($conn, $user_id, $description, $total, $status, $date);
} else {
    header("location: ../checkout.php");
    exit();
}
