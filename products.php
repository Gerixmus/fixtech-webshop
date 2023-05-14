<?php 
include 'includes/dbh.inc.php';
?>

<?php 
if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'product_name' => $_POST["hidden_name"],
                'price' => $_POST["hidden_price"],
                'quantity' => $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
            if(in_array($_GET["id"], $item_array_id))
            {
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                {
                    if($_GET["id"] == $_SESSION["shopping_cart"][$keys]["product_id"]){
                        $_SESSION["shopping_cart"][$keys]["quantity"] = $_SESSION["shopping_cart"][$keys]["quantity"]+$_POST["quantity"];
                        echo'<script>alert("Item Added")</script>';
                    }   
                }                 
             }
        }
    }
    else
    {
        $item_array=array(
            'product_id' => $_GET["id"],
            'product_name' => $_POST["hidden_name"],
            'price' => $_POST["hidden_price"],
            'quantity' => $_POST["quantity"],
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["product_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo'<script>alert("Item Removed")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
}


?>

<div class="products_header">
    Products
</div>
<div class="products">
    
    <!-- <?php 
        $sql2 = "SELECT active FROM user where email='admin@admin.com'";
        $result2 = mysqli_query($conn,$sql2);
        while($row = mysqli_fetch_assoc($result2)){
            $i = $row['active'];
            echo '<p>'.$i.'</p>';
        }
    ?> -->

    <table class="table">
        <thead>
            <tr>
                <th scope="col">PID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Manufacturer</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($_GET['search'])){
                $search = $_GET["search"];
                $sql = "SELECT * FROM product WHERE product_name LIKE '%$search%' AND status = '1'";
            }
            else {
                $sql = "SELECT * FROM product WHERE status = '1'";
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
                    <td><form method="post" action="index.php?action=add&id=$'.$product_id.'"><input type="number" name="quantity" class="form-control" value="1"/></td>
                    <input type="hidden" name="hidden_name" class="form-control" value="'.$product_name.'"/>
                    <input type="hidden" name="hidden_price" class="form-control" value="'.$price.'"/>
                    <td><input type="submit" name="add_to_cart" class="btn" value="Add to Cart"/>
                    </form></td>
                    </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>
    <div class="products_header">
    Shopping cart
    </div>
<div class="products">
    <table class="table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if(!empty($_SESSION["shopping_cart"]))
        {
            $total = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                ?>
                <tr>
                    <td><?php echo $values["product_name"]; ?></td>
                    <td><?php echo $values["quantity"]; ?></td>
                    <td><?php echo $values["price"]; ?></td>
                    <td><?php echo number_format($values["quantity"] * $values["price"], 2); ?></td>
                    <td><a href="index.php?action=delete&id=<?php echo $values["product_id"]; ?>"><button class="btn">Remove</button></a></td>
                </tr>
                <?php
                    $total = $total + ($values["quantity"] * $values["price"]);
            }
            ?>
            <tr>
                <td>Total</td>
                <td>€<?php echo number_format($total, 2); ?></td>
                <td><a href="checkout.php"><button class="btn">Checkout</button></a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
