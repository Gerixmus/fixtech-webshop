<?php include_once('header.php');?>
<body>
    <div class="page">
        <?php include('navbar.php');?>
        <section class="signup">
            <h2>Sign Up</h2>
            <form action='includes/signup.inc.php' method='post' class="signup-form">
                <input type="text" name="name" placeholder='First Name'>
                <input type="text" name="surname" placeholder='Surname'>
                <input type="text" name="email" placeholder='Email'>
                <input type="password" name="passwd" placeholder='Password'>
                <button type="submit" name="submit" class="btn">Sign Up</button>
            </form>
            <?php 
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Please fill in all fields.</p>";
                }
                elseif ($_GET["error"] == "invalidemail") {
                    echo "<p>Please fill in email correctly.</p>";
                }
                elseif ($_GET["error"] == "emailtaken") {
                    echo "<p>This email is already taken.</p>";
                }
                elseif ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong.</p>";
                }
                elseif ($_GET["error"] == "none") {
                    echo "<p>Signed up succesfully.</p>";
                }
            }
            ?>
        </section>
    </div>
</body>
</html>