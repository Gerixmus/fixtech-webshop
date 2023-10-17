<?php
session_start();
include_once('header.php');
include('includes/dbh.inc.php'); ?>

<?php
session_start();
require_once 'includes/functions.inc.php';
if (!isset($_SESSION['email'])) {
    header('location: login.php');
} elseif ((emailTaken($conn, $_SESSION["email"]))['privilege'] != '1') {
    header('location: index.php');
}
?>

<body>
    <div class="page">
        <?php include('navbar.php'); ?>

        <div class="login-form">
            <h2>Change user password</h2>
            <?php
            if (isset($_GET['updateid'])) {
                $user_id = $_GET['updateid'];
                echo "<form action='includes/change.inc.php' method='post' class='signup-form'>
                    <div class='form-group'>
                    <label for='user_id'>User ID</label>
                    <input type='text' id='user_id' name='user_id' value=$user_id readonly>
                    </div>
                    <div class='form-group'>
                    <label for='password'>New password</label>
                    <input type='text' id='password' name='password' value=''>
                    </div>                                 
                    <button type='submit' name='submit'>Change password</button>
                </form>";
            }
            ?>

        </div>

        <?php include('footer.php'); ?>
    </div>
</body>

</html>