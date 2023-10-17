<?php include_once('header.php');
include('includes/dbh.inc.php');
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

        <div class="orders-container">
            <h1 class="product-main-header">Product management</h1>
            <table class="product-table">
                <thead>
                    <tr>
                        <th class='product-header'>PID</th>
                        <th class='product-header'>Name</th>
                        <th class='product-header'>Category</th>
                        <th class='product-header'>Price</th>
                        <th class='product-header'>Manufacturer</th>
                        <th class='product-header'>Status</th>
                        <th class='product-header'>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['search'])) {
                        $search = $_GET["search"];
                        $sql = "SELECT * FROM product WHERE product_name LIKE '%$search%'";
                    } else {
                        $sql = "SELECT * FROM product";
                    }
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $product_id = $row['product_id'];
                            $product_name = $row['product_name'];
                            $category = $row['category'];
                            $price = $row['price'];
                            $manufacturer = $row['manufacturer'];
                            $status = $row['status'];
                            echo '<tr class="product-row">
                            <td class="product-data">' . $product_id . '</td>
                            <td class="product-data">' . $product_name . '</td>
                            <td class="product-data">' . $category . '</td>
                            <td class="product-data"> €' . $price . '</td>
                            <td class="product-data">' . $manufacturer . '</td>
                            <td class="product-data">' . $status . '</td>
                            <td class="product-data"><button class="add-to-cart-button"><a href="update_product.php?updateid=' . $product_id . '">Update</a></button>
                            </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="option-button">
                <button class="add-to-cart-button"><a href="add_product.php">Add product</a></button>
            </div>
        </div>

        <?php include('footer.php'); ?>
    </div>
</body>

</html>
<?php
include 'includes/dbh.inc.php';
?>