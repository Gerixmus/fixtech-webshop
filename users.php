<?php include_once('header.php');
include 'includes/dbh.inc.php';

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
        <div class="orders-container">
            <h1 class="product-main-header">User management</h1>
            <table class="product-table">
                <thead>
                    <tr>
                        <th class='product-header'>UID</th>
                        <th class='product-header'>Privilege</th>
                        <th class='product-header'>Name</th>
                        <th class='product-header'>Surname</th>
                        <th class='product-header'>Email</th>
                        <th class='product-header'>Phone no</th>
                        <th class='product-header'>Active</th>
                        <th class='product-header'>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM user";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $user_id = $row['user_id'];
                            $privilege = $row['privilege'];
                            $name = $row['name'];
                            $surname = $row['surname'];
                            $email = $row['email'];
                            $phone_no = $row['phone_no'];
                            $active = $row['active'];
                            echo '<tr class="product-row">
                            <td class="product-data">' . $user_id . '</td>
                            <td class="product-data">' . $privilege . '</td>
                            <td class="product-data">' . $name . '</td>
                            <td class="product-data">' . $surname . '</td>
                            <td class="product-data">' . $email . '</td>
                            <td class="product-data">' . $phone_no . '</td>
                            <td class="product-data">' . $active . '</td>
                            <td class="product-data"><button class="add-to-cart-button"><a href="update.php?updateid=' . $user_id . '">Update</a></button>
                            </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>

</html>