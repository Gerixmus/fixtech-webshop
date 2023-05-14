<!-- <?php 
    session_start();
?> -->
<?php 
include 'includes/dbh.inc.php';
?>

<div class="nav-container">
    <div class="logo">
        <img src="images/tools.png" alt="Shop Logo" class="image">
        <h1 class="title">FIX TECH</h1>
    </div>
    <div class="menu">               
        <ul class="a">
            <li>
                <a href="http://localhost/webshop/index.php">Home</a>
            </li>
            <?php 
                if (isset($_SESSION["email"])) {
                    require_once 'includes/functions.inc.php';
                    if ((emailTaken($conn,$_SESSION["email"]))['privilege']!='0') {
                        echo "<li><a href='orders.php'>Orders</a></li>";
                        echo "<li><a href='products_admin.php'>Products</a></li>";
                        echo "<li><a href='users.php'>Users</a></li>";
                        echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
                    }
                    else {
                        echo "<li><a href='orders.php'>Orders</a></li>";
                        echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
                    }
                }
                else {
                    echo "<li><a href='signup.php'>Sign up</a></li>";
                    echo "<li><a href='login.php'>Login</a></li>";
                }
            ?>
        </ul>
    </div>
</div>


<!-- 
TO DO LIST
make users.php inaccessible to normal user 
make each header work
-->