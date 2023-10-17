<?php
session_start();
include_once('header.php');
?>

<body>
    <div class="page">
        <?php include('navbar.php'); ?>

        <div class="login-form">
            <h2>Login</h2>
            <form action='includes/login.inc.php' method='post' class="signup-form">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "wronginfo") {
                        echo "<p class='error-message'>Wrong email or password.</p>";
                    }
                }
                ?>
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>

</html>