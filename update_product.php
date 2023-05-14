<?php include_once('header.php');?>
<?php include ('includes/dbh.inc.php');?>

<?php
    session_start();
    require_once 'includes/functions.inc.php';
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
    elseif((emailTaken($conn,$_SESSION["email"]))['privilege']!='1'){
        header('location: index.php');
    }
?>

<body>
    <div class="page">
        <?php include('navbar.php');?>
        
        <div class="update">
            <?php
            if(isset($_GET['updateid'])){
                $id = $_GET['updateid'];
                $sql = "SELECT * FROM product WHERE product_id = $id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $category = $row['category'];
                $price = $row['price'];
                $manufacturer = $row['manufacturer'];
                $status = $row['status'];
                echo "<form action='includes/update_product.inc.php' method='post'>
                <label for='product_id'>Product ID</label><br>
                <input type='text' id='product_id' name='product_id' value=$product_id readonly><br>
                <label for='product_name'>Product Name</label><br>
                <input type='text' id='product_name' name='product_name' value=$product_name><br>
                <label for='category'>Category</label><br>
                <input type='text' id='category' name='category' value=$category><br>
                <label for='price'>Price</label><br>
                <input type='text' id='price' name='price' value=$price><br>
                <label for='manufacturer'>Manufacturer</label><br>
                <input type='text' id='manufacturer' name='manufacturer' value=$manufacturer><br>
                <label for='status'>Status</label><br>
                <input type='text' id='status' name='status' value=$status><br>
                <input type='submit' name='submit' value='Update'>
            </form>";
            }
            ?>
        </div>

        <?php include('footer.php');?>
    </div>
</body>
</html>