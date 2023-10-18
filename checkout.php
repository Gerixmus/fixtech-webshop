<?php
session_start();
include_once('header.php');
?>

<?php
include 'includes/dbh.inc.php';
$description_creator = '';
?>

<?php
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
?>

<body>
    <div class="page">
        <?php include('navbar.php'); ?>

        <div class="product-container">
            <h1 class="product-main-header">Checkout</h1>
            <table class="product-table">
                <thead>
                    <tr>
                        <th class="product-header">Item ID</th>
                        <th class="product-header">Item Name</th>
                        <th class="product-header">Quantity</th>
                        <th class="product-header">Price</th>
                        <th class="product-header">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($_SESSION["shopping_cart"])) {
                        $total = 0;
                        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    ?>
                            <tr class="product-row">
                                <td class="product-data"><?php echo $values["product_id"]; ?></td>
                                <td class="product-data"><?php echo $values["product_name"]; ?></td>
                                <td class="product-data"><?php echo $values["quantity"]; ?></td>
                                <td class="product-data"><?php echo $values["price"]; ?></td>
                                <td class="product-data"><?php echo number_format($values["quantity"] * $values["price"], 2); ?></td>
                            </tr>
                            <?php
                            $description_creator .= ', { "product_id": "' . $values["product_id"] . '", "product_name": "' . $values["product_name"] . '", "quantity": "' . $values["quantity"] . '" }';

                            $total = $total + ($values["quantity"] * $values["price"]);
                            ?>
                        <?php
                        }
                        ?>
                        <tr class="product-row">
                            <td class="product-data">Total</td>
                            <td class="product-data">€<?php echo number_format($total, 2); ?></td>
                            <?php $user_id = emailTaken($conn, $_SESSION["email"])['user_id'];
                            $date = date("Y-m-d h:i:sa");
                            $description_creator = ltrim($description_creator, ', '); ?>
                            <td class="product-data">
                                <form action="includes/checkout.inc.php" method="post">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <input type="hidden" name="description" value='<?php echo $description_creator; ?>'>
                                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                                    <input type="hidden" name="status" value="1">
                                    <input type="hidden" name="date" value="<?php echo $date; ?>">
                                    <button type="submit" class="add-to-cart-button" name="submit">Buy</button>
                                </form>
                            </td>
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