<!-- <?php
        session_start();
        ?> -->
<?php
include 'includes/dbh.inc.php';
?>

<body>
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="images/tools.png" alt="Icon">
            <span class="navbar-text">Fix Tech</span>
        </div>
        <ul class="navbar-links">
            <li><a href="index.php">Home</a></li>
            <?php
            if (isset($_SESSION["email"])) {
                require_once 'includes/functions.inc.php';
                if ((emailTaken($conn, $_SESSION["email"]))['privilege'] != '0') {
                    echo "<li><a href='orders.php'>Orders</a></li>";
                    echo "<li><a href='products_admin.php'>Products</a></li>";
                    echo "<li><a href='users.php'>Users</a></li>";
                    echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
                } else {
                    echo "<li><a href='orders.php'>Orders</a></li>";
                    echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
                }
            } else {
                echo "<li><a href='signup.php'>Sign up</a></li>";
                echo "<li><a href='login.php'>Login</a></li>";
            }
            ?>
        </ul>
    </nav>
</body>