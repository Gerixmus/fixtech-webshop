<?php include_once('header.php'); ?>
<?php include('includes/dbh.inc.php'); ?>

<?php
session_start();
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
            echo "<form action='includes/add_product.inc.php' method='post' class='signup-form'>
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

                <button type='submit' name='submit'>Submit</button>
                </form>";
            ?>
        </div>

        <?php include('footer.php'); ?>
    </div>
</body>

</html>