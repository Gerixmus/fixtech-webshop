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
        echo '<tr class="product-row">
        <td class="product-data">' . $row['product_id'] . '</td>
        <td class="product-data">' . $row['product_name'] . '</td>
        <td class="product-data">' . $row['category'] . '</td>
        <td class="product-data">' . $row['price'] . '</td>
        <td class="product-data">' . $row['manufacturer'] . '</td>
        <td><form method="post" action="index.php?action=add&id=$' . $row['product_id'] . '"><input type="number" name="quantity" class="form-control" value="1" min="0" max="999"/>
        <input type="hidden" name="hidden_name" class="form-control" value="' . $row['product_name'] . '"/>
        <input type="hidden" name="hidden_price" class="form-control" value="' . $row['price'] . '"/>
        <input type="submit" name="add_to_cart" class="btn" value="Add to Cart"/>
        </form></td>';
    }
}
