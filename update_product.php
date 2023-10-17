<?php
session_start();
include_once('header.php');
include('includes/dbh.inc.php');
?>

<?php
require_once 'includes/functions.inc.php';
if (!isset($_SESSION['email'])) {
    header('location: login.php');
} elseif ((emailTaken($conn, $_SESSION["email"]))['privilege'] != '1') {
    header('location: index.php');
}
?>

<body>
    <div class="page">
        <?php include('navbar.php'); ?>

        <div class="login-form">
            <h2>Update product</h2>
            <?php
            if (isset($_GET['updateid'])) {
                $id = $_GET['updateid'];
                $sql = "SELECT * FROM product WHERE product_id = $id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $category = $row['category'];
                $price = $row['price'];
                $manufacturer = $row['manufacturer'];
                $status = $row['status'];
                echo "<form action='includes/update_product.inc.php' method='post' class='signup-form'>
                <div class='form-group'>
                <label for='product_id'>Product ID</label>
                <input type='text' id='product_id' name='product_id' value=$product_id readonly>
                </div>
                <div class='form-group'>
                <label for='product_name'>Product Name</label>
                <input type='text' id='product_name' name='product_name' value=$product_name>
                </div>
                <div class='form-group'>
                <label for='category'>Category</label>
                <input type='text' id='category' name='category' value=$category>
                </div>
                <div class='form-group'>
                <label for='price'>Price</label>
                <input type='text' id='price' name='price' value=$price>
                </div>
                <div class='form-group'>
                <label for='manufacturer'>Manufacturer</label>
                <input type='text' id='manufacturer' name='manufacturer' value=$manufacturer>
                </div>
                <div class='form-group'>
                <label for='status'>Status</label>
                <input type='text' id='status' name='status' value=$status>
                </div>
 
                <button type='submit' name='submit'>Submit</button>
            </form>";
            }
            ?>
        </div>

        <?php include('footer.php'); ?>
    </div>
</body>

</html>