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

        <div class="products">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">PID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Manufacturer</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($_GET['search'])){
                $search = $_GET["search"];
                $sql = "SELECT * FROM product WHERE product_name LIKE '%$search%'";
            }
            else {
                $sql = "SELECT * FROM product";
            }
            $result = mysqli_query($conn,$sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $product_id = $row['product_id'];
                    $product_name = $row['product_name'];
                    $category = $row['category'];
                    $price = $row['price'];
                    $manufacturer = $row['manufacturer'];
                    $status = $row['status'];
                    echo '<tr><th scope="row">'.$product_id.'</th>
                    <td>'.$product_name.'</td>
                    <td>'.$category.'</td>
                    <td> €'.$price.'</td>
                    <td>'.$manufacturer.'</td>
                    <td>'.$status.'</td>
                    <td><button><a href="update_product.php?updateid='.$product_id.'">Update</a></button>
                    </tr>';
                }
            }
            ?>
        </tbody>
    </table>
    <td><button><a href="add_product.php">Add product</a></button>
</div>

        <?php include('footer.php');?>
    </div>
</body>
</html>
<?php 
include 'includes/dbh.inc.php';
?>
