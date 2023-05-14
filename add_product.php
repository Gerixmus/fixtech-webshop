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
                echo "<form action='includes/add_product.inc.php' method='post'>
                <label for='product_name'>Product Name</label><br>
                <input type='text' id='product_name' name='product_name' value=><br>
                <label for='category'>Category</label><br>
                <input type='text' id='category' name='category' value=><br>
                <label for='price'>Price</label><br>
                <input type='text' id='price' name='price' value=><br>
                <label for='manufacturer'>Manufacturer</label><br>
                <input type='text' id='manufacturer' name='manufacturer' value=><br>
                <label for='status'>Status</label><br>
                <input type='text' id='status' name='status' value=><br>
                <input type='submit' name='submit' value='Add Product'>
                </form>";
            ?>
        </div>

        <?php include('footer.php');?>
    </div>
</body>
</html>