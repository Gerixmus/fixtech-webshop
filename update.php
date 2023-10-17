<?php
session_start();
include_once('header.php');
include('includes/dbh.inc.php');
?>

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
            <h2>Update user data</h2>
            <?php
            if (isset($_GET['updateid'])) {
                $id = $_GET['updateid'];
                $sql = "SELECT * FROM user WHERE user_id = $id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $user_id = $row['user_id'];
                $privilege = $row['privilege'];
                $name = $row['name'];
                $surname = $row['surname'];
                $email = $row['email'];
                $phone_no = $row['phone_no'];
                $active = $row['active'];
                echo "<form action='includes/update_user.inc.php' method='post' class='signup-form'>
                <div class='form-group'>
                <label for='user_id'>User ID</label>
                <input type='text' id='user_id' name='user_id' value=$user_id readonly>
                </div>
                <div class='form-group'>
                <label for='privilege'>Privilege</label>
                <input type='text' id='privilege' name='privilege' value=$privilege>
                </div>
                <div class='form-group'>
                <label for='name'>Name</label>
                <input type='text' id='name' name='name' value=$name>
                </div>
                <div class='form-group'>
                <label for='surname'>Surname</label>
                <input type='text' id='surname' name='surname' value=$surname>
                </div>
                <div class='form-group'>
                <label for='email'>Email</label>
                <input type='text' id='email' name='email' value=$email>
                </div>
                <div class='form-group'>
                <label for='phone_no'>Phone number</label>
                <input type='text' id='phone_no' name='phone_no' value=$phone_no>
                </div>
                <div class='form-group'>
                <label for='active'>Active</label>
                <input type='text' id='active' name='active' value=$active>
                </div>
                
                <div>
                <button type='submit' name='submit'>Update</button>
                <button><a href='change.php?updateid=" . $id . "'>Change password</a></button>
                </div>
                
            </form>";
            }
            ?>
        </div>

        <?php include('footer.php'); ?>
    </div>
</body>

</html>