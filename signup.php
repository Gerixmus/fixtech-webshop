<?php
session_start();
include_once('header.php');
?>

<body>
    <div class="page">
        <?php include('navbar.php'); ?>


        <div class="login-form">
            <h2>Sign Up</h2>
            <form action='includes/signup.inc.php' method='post' class="signup-form">
                <div class="form-group">
                    <label for="name">First name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname" placeholder="Enter your surname" required>
                </div>
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
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p class='error-message'>Please fill in all fields.</p>";
                    } elseif ($_GET["error"] == "invalidemail") {
                        echo "<p class='error-message'>Please fill in email correctly.</p>";
                    } elseif ($_GET["error"] == "emailtaken") {
                        echo "<p class='error-message'>This email is already taken.</p>";
                    } elseif ($_GET["error"] == "stmtfailed") {
                        echo "<p class='error-message'>Something went wrong.</p>";
                    } elseif ($_GET["error"] == "none") {
                        echo "<p class='success-message'>Signed up succesfully.</p>";
                    }
                }
                ?>
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>

</html>