<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php
include 'includes/dbh.inc.php';
?>

<script>
    $(document).ready(function() {
        // Function to load products
        function loadProducts(search) {
            $.ajax({
                url: "get_products.php",
                type: "GET",
                data: {
                    search: search
                },
                success: function(response) {
                    // Update the product listing with the retrieved data
                    $("#product-list").html(response);
                },
                error: function(xhr, status, error) {
                    console.log("AJAX request failed. Error: " + error);
                }
            });
        }

        // Initial load of products when the page loads
        loadProducts($("#search").val());

        // Submit form using AJAX
        $("#search-form").submit(function(event) {
            event.preventDefault(); // Prevent the default form submission
            var search = $("#search").val();
            loadProducts(search);
        });
    });
</script>

<body>
    <nav class="navbar">
        <a href="index.php" class="navbar-logo">
            <img src="images\fixtech.png" alt="fixtech">
        </a>
        <form class="search-bar" id="search-form">
            <input class="search-field" id="search" placeholder="">
            <button class="search-button" type="submit">
                <img src="images\magnifying-glass-solid.svg" class="search-icon"></img>
            </button>
        </form>
        <?php if (isset($_SESSION["email"])) {
            require_once 'includes/functions.inc.php';
            if ((emailTaken($conn, $_SESSION["email"]))['privilege'] != '0') {
        ?>
                <a href='cart.php' class="nav-link">
                    <img src="images\basket-shopping-solid.svg" class="nav-icon"></img>
                    <div class="nav-link-text">Cart</div>
                </a>
                <a href='orders.php' class="nav-link">
                    <img src="images\book-solid.svg" class="nav-icon"></img>
                    <div class="nav-link-text">Orders</div>
                </a>
                <a href='products_admin.php' class="nav-link">
                    <img src="images\list-ul-solid.svg" class="nav-icon"></img>
                    <div class="nav-link-text">Products</div>
                </a>
                <a href='users.php' class="nav-link">
                    <img src="images\user-regular.svg" class="nav-icon"></img>
                    <div class="nav-link-text">Users</div>
                </a>
                <a href='includes/logout.inc.php' class="nav-link">
                    <img src="images\right-from-bracket-solid.svg" class="nav-icon"></img>
                    <div class="nav-link-text">Logout</div>
                </a>
                <a href='index.php' class="nav-link selector">
                    <img src="images\bars-solid.svg" class="nav-icon"></img>
                    <div class="nav-link-text">Menu</div>
                </a>
            <?php
            } else {
            ?>
                <a href='cart.php' class="nav-link">
                    <img src="images\basket-shopping-solid.svg" class="nav-icon"></img>
                    <div class="nav-link-text">Cart</div>
                </a>
                <a href='orders.php' class="nav-link">
                    <img src="images\book-solid.svg" class="nav-icon"></img>
                    <div class="nav-link-text">Orders</div>
                </a>
                <a href='includes/logout.inc.php' class="nav-link">
                    <img src="images\right-from-bracket-solid.svg" class="nav-icon"></img>
                    <div class="nav-link-text">Logout</div>
                </a>
            <?php
            }
        } else {
            ?>
            <a href='signup.php' class="nav-link">
                <img src="images\address-card-regular.svg" class="nav-icon"></img>
                <div class="nav-link-text">Sign up</div>
            </a>
            <a href='login.php' class="nav-link">
                <img src="images\right-to-bracket-solid.svg" class="nav-icon"></img>
                <div class="nav-link-text">Login</div>
            </a>
        <?php
        } ?>
    </nav>
</body>