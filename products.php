<?php
if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'product_name' => $_POST["product_name"],
                'quantity' => $_POST["product_quantity"],
                'price' => $_POST["product_price"],
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
            'product_name' => $_POST["product_name"],
            'quantity' => $_POST["product_quantity"],
            'price' => $_POST["product_price"],
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
    <div id="product-list">
        <!-- Products will be loaded here -->
    </div>
</div>