<?php

if (isset($_POST["submit"])) {
    $product_id = $_POST["product_id"];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $manufacturer = $_POST['manufacturer'];
    $status = $_POST['status'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    updateProduct ($conn ,$product_name, $category, $price, $manufacturer, $status, $product_id);
}
else {
    header("location: ../products_admin.php");
    exit();
}