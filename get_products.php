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
?>
        <form class="product-card" method="post" action="index.php?action=add&id=<?= $row['product_id'] ?>">
            <input type="hidden" name="product_name" value="<?= $row['product_name'] ?>">
            <input type="hidden" name="product_quantity" value="1">
            <input type="hidden" name="product_price" value="<?= $row['price'] ?>">
            <img src="<?= substr($row['photo'], 3) ?>" alt="Product Image" class="product-image">
            <h3 class="product-name" name="product-name"><?= $row['product_name'] ?></h3>
            <p class="product-price" name="product-price">Price: $<?= $row['price'] ?></p>
            <p class="product-manufacturer" name="product-manufacturer">Manufacturer: <?= $row['manufacturer'] ?></p>
            <input type="hidden" id="quantity" name="quantity" value="1">

            <button class="add-to-cart-button" type="submit" name="add_to_cart">Add to Cart</button>
        </form>
<?php
    }
}
?>