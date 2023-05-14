<?php include_once('header.php');?>
<body>
    <div class="page">
        <?php include('navbar.php');?>
        <section class="signup">
            <h2>Login</h2>
            <form action='includes/login.inc.php' method='post' class="signup-form">
                <input type="email" name="email" placeholder='Email'>
                <input type="password" name="passwd" placeholder='Password'>
                <button type="submit" name="submit" class="btn">Login</button>
            </form>
            <?php 
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Please fill in all fields.</p>";
                }
                elseif ($_GET["error"] == "wronginfo") {
                    echo "<p>Wrong email or password.</p>";
                }
            }
            ?>
        </section>
    </div>
</body>
</html>