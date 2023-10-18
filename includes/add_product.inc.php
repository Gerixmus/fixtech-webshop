<?php

if (isset($_POST["submit"])) {
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $manufacturer = $_POST['manufacturer'];
    $status = $_POST['status'];
    $uploadDir = '../product_images/';
    $uploadedFile = $uploadDir . basename($_FILES['product_image']['name']);

    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $uploadedFile)) {
        $photo = $uploadedFile;
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        addProduct($conn, $product_name, $category, $price, $manufacturer, $status, $photo);
    }
} else {
    header("location: ../products_admin.php");
    exit();
}
