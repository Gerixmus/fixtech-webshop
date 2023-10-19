<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php
include 'includes/dbh.inc.php';
?>

<script>
    function toggleMenu() {
        var mobile_menu = document.getElementById("mobile-menu");
        var mobile_links = document.getElementById("mobile-nav-links");
        if (mobile_menu.style.zIndex == "-1") {
            mobile_menu.style.zIndex = "1";
            mobile_links.style.transform = "translateX(0)";
            document.body.style.overflow = "hidden";
        } else {
            mobile_menu.style.zIndex = "-1";
            mobile_links.style.transform = "translateX(-100%)";
            document.body.style.overflow = "auto";
        }
    }

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
                <a href='products_admin.php' class="nav-link">
                    <img src="images\list-ul-solid.svg" class="nav-icon"></img>
                    <div class="nav-link-text">Products</div>
                </a>
                <a href='users.php' class="nav-link">
                    <img src="images\user-regular.svg" class="nav-icon"></img>
                    <div class="nav-link-text">Users</div>
                </a>
            <?php
            }
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
            <a class="nav-link selector" onclick="toggleMenu()">
                <img src="images\bars-solid.svg" class="nav-icon"></img>
                <div class="nav-link-text">Menu</div>
            </a>
        <?php
        } else {
        ?>
            <a href='login.php' class="nav-link">
                <img src="images\right-to-bracket-solid.svg" class="nav-icon"></img>
                <div class="nav-link-text">Login</div>
            </a>
            <a href='signup.php' class="nav-link">
                <img src="images\address-card-regular.svg" class="nav-icon"></img>
                <div class="nav-link-text">Sign up</div>
            </a>
            <a href='cart.php' class="nav-link">
                <img src="images\basket-shopping-solid.svg" class="nav-icon"></img>
                <div class="nav-link-text">Cart</div>
            </a>
            <a class="nav-link selector" onclick="toggleMenu()">
                <img src="images\bars-solid.svg" class="nav-icon"></img>
                <div class="nav-link-text">Menu</div>
            </a>
        <?php
        }
        ?>
    </nav>

    <nav class="mobile-menu" id="mobile-menu" style="z-index: -1;">
        <div class="mobile-nav-links" id="mobile-nav-links">
            <?php if (isset($_SESSION["email"])) {
                require_once 'includes/functions.inc.php';
                if ((emailTaken($conn, $_SESSION["email"]))['privilege'] != '0') {
            ?>
                    <a href='products_admin.php' class="mobile-nav-link">
                        <img src="images\list-ul-solid.svg" class="mobile-nav-icon"></img>
                        <div class="mobile-nav-link-text">Products</div>
                    </a>
                    <a href='users.php' class="mobile-nav-link">
                        <img src="images\user-regular.svg" class="mobile-nav-icon"></img>
                        <div class="mobile-nav-link-text">Users</div>
                    </a>
                <?php
                }
                ?>
                <a href='cart.php' class="mobile-nav-link">
                    <img src="images\basket-shopping-solid.svg" class="mobile-nav-icon"></img>
                    <div class="mobile-nav-link-text">Cart</div>
                </a>
                <a href='orders.php' class="mobile-nav-link">
                    <img src="images\book-solid.svg" class="mobile-nav-icon"></img>
                    <div class="mobile-nav-link-text">Orders</div>
                </a>
                <a href='includes/logout.inc.php' class="mobile-nav-link">
                    <img src="images\right-from-bracket-solid.svg" class="mobile-nav-icon"></img>
                    <div class="mobile-nav-link-text">Logout</div>
                </a>
            <?php
            } else {
            ?>
                <a href='login.php' class="mobile-nav-link">
                    <img src="images\right-to-bracket-solid.svg" class="mobile-nav-icon"></img>
                    <div class="mobile-nav-link-text">Login</div>
                </a>
                <a href='signup.php' class="mobile-nav-link">
                    <img src="images\address-card-regular.svg" class="mobile-nav-icon"></img>
                    <div class="mobile-nav-link-text">Sign up</div>
                </a>
                <a href='cart.php' class="mobile-nav-link">
                    <img src="images\basket-shopping-solid.svg" class="mobile-nav-icon"></img>
                    <div class="mobile-nav-link-text">Cart</div>
                </a>
            <?php
            }
            ?>
        </div>
    </nav>
</body>