<?php
include 'includes/dbh.inc.php';

if (isset($_GET['search'])) {
    $search = $_GET["search"];
    $sql = "SELECT * FROM product WHERE product_name LIKE '%$search%' AND status = '1'";
} else {
    $sql = "SELECT * FROM product WHERE status = '1'";
}

$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Generate HTML for each product
        echo '<div class="product">' . $row['product_name'] . '</div>';
    }
}
