<?php
session_start();
include_once('header.php');
?>

<?php
include 'includes/dbh.inc.php';
$description_creator = "";
$description = "";
?>

<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
?>

<body>
    <div class="page">
        <?php include('navbar.php'); ?>
        <table class="table" style="background-color: white;">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                ?>
                        <tr>
                            <td><?php echo $values["product_id"]; ?></td>
                            <td><?php echo $values["product_name"]; ?></td>
                            <td><?php echo $values["quantity"]; ?></td>
                            <td><?php echo $values["price"]; ?></td>
                            <td><?php echo number_format($values["quantity"] * $values["price"], 2); ?></td>
                        </tr>
                    <?php
                        $description_creator .= '{ "product_id": "' . $values["product_id"] . '", "product_name": "' . $values["product_name"] . '", "quantity": "' . $values["quantity"] . '" }, ';
                        $description = substr($description_creator, 0, -2);
                        $total = $total + ($values["quantity"] * $values["price"]);
                    }
                    ?>
                    <tr>
                        <td>Total</td>
                        <td>€<?php echo number_format($total, 2); ?></td>
                        <?php $user_id = emailTaken($conn, $_SESSION["email"])['user_id'];
                        $date = date("Y-m-d h:i:sa");
                        echo "<td><form action='includes/checkout.inc.php' method='post'>
                        <input type='hidden' id='user_id' name='user_id' value='$user_id'>
                        <input type='hidden' id='description' name='description' value='$description'>
                        <input type='hidden' id='total' name='total' value='$total'>
                        <input type='hidden' id='status' name='status' value='1'>
                        <input type='hidden' id='date' name='date' value='$date'>
                        <input type='submit' class='btn' name='submit' value='Buy'>
                        </form></td>" ?>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php include('footer.php'); ?>
    </div>
</body>

</html>