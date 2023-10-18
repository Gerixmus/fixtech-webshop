<?php
session_start();
include_once('header.php');
include('includes/dbh.inc.php');
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
            <h2>Add product</h2>
            <?php
            echo "<form action='includes/add_product.inc.php' method='post' class='signup-form' enctype='multipart/form-data'>
                <div class='form-group'>
                <label for='product_name'>Product Name</label>
                <input type='text' id='product_name' name='product_name' value=>
                </div>
                <div class='form-group'>
                <label for='category'>Category</label>
                <input type='text' id='category' name='category' value=>
                </div>
                <div class='form-group'>
                <label for='price'>Price</label>
                <input type='text' id='price' name='price' value=>
                </div>
                <div class='form-group'>
                <label for='manufacturer'>Manufacturer</label>
                <input type='text' id='manufacturer' name='manufacturer' value=>
                </div>
                <div class='form-group'>
                <label for='status'>Status</label>
                <input type='text' id='status' name='status' value=>
                </div>
                <div class='form-group'>
                <label for='product_image'>Product Image</label>
                <input type='file' id='product_image' name='product_image'>
                </div>

                <button type='submit' name='submit'>Submit</button>
                </form>";
            ?>
        </div>

        <?php include('footer.php'); ?>
    </div>
</body>

</html>