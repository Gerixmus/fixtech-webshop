<?php
if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'product_name' => $_POST["hidden_name"],
                'price' => $_POST["hidden_price"],
                'quantity' => $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            if (in_array($_GET["id"], $item_array_id)) {
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    if ($_GET["id"] == $_SESSION["shopping_cart"][$keys]["product_id"]) {
                        $_SESSION["shopping_cart"][$keys]["quantity"] = $_SESSION["shopping_cart"][$keys]["quantity"] + $_POST["quantity"];
                    }
                }
            }
        }
    } else {
        $item_array = array(
            'product_id' => $_GET["id"],
            'product_name' => $_POST["hidden_name"],
            'price' => $_POST["hidden_price"],
            'quantity' => $_POST["quantity"],
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["product_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
            }
        }
    }
}


?>


<div class="product-container">
    <h1 class="product-main-header">Product List</h1>
    <table class="product-table">
        <thead>
            <tr>
                <th class="product-header">Product ID</th>
                <th class="product-header">Product Name</th>
                <th class="product-header">Category</th>
                <th class="product-header">Price</th>
                <th class="product-header">Manufacturer</th>
                <th class="product-header">Action</th>
            </tr>
        </thead>
        <tbody id="product-list">
            <!-- Products will be loaded here -->
        </tbody>
    </table>
    <?php
    if (!empty($_SESSION["shopping_cart"])) {
        echo '<a href="cart.php" class="cart-icon" id="cart-icon">
    <i class="fas fa-shopping-cart"></i>
</a>';
    } ?>
</div>