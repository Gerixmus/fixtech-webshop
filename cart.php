<?php
session_start();
include_once('header.php');
?>

<body>
    <div class="page">
        <?php include('navbar.php'); ?>

        <div class="product-container">
            <h1 class="product-main-header">Shopping cart</h1>
            <table class="product-table">
                <thead>
                    <tr>
                        <th class="product-header">Item Name</th>
                        <th class="product-header">Quantity</th>
                        <th class="product-header">Price</th>
                        <th class="product-header">Total</th>
                        <th class="product-header">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($_SESSION["shopping_cart"])) {
                        $total = 0;
                        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    ?>
                            <tr class="product-row">
                                <td class="product-data"><?php echo $values["product_name"]; ?></td>
                                <td class="product-data"><?php echo $values["quantity"]; ?></td>
                                <td class="product-data"><?php echo $values["price"]; ?></td>
                                <td class="product-data"><?php echo number_format($values["quantity"] * $values["price"], 2); ?></td>
                                <td class="product-data"><a href="index.php?action=delete&id=<?php echo $values["product_id"]; ?>">
                                        <button class="add-to-cart-button">Remove</button></td>
                            </tr>
                        <?php
                            $total = $total + ($values["quantity"] * $values["price"]);
                        }
                        ?>
                        <tr class="product-row">
                            <td class="product-data">Total</td>
                            <td class="product-data">€<?php echo number_format($total, 2); ?></td>
                            <td class="product-data"><a href="checkout.php">
                                    <button class="add-to-cart-button">Checkout</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php include('footer.php'); ?>
    </div>
</body>

</html>