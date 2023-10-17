<?php
session_start();
include_once('header.php');
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
?>

<body>
    <div class="page">
        <?php include('navbar.php'); ?>

        <div class="orders-container">
            <h1 class="product-main-header">Orders</h1>
            <table class="product-table">
                <thead>
                    <?php if ((emailTaken($conn, $_SESSION["email"]))['privilege'] != '0') {
                        echo "<tr>
                    <th class='product-header'>Order ID</th>
                    <th class='product-header'>User ID</th>
                    <th class='product-header'>Description</th>
                    <th class='product-header'>Total</th>
                    <th class='product-header'>Status</th>
                    <th class='product-header'>Date</th>
                </tr>";
                    } else {
                        echo "<tr>
                    <th class='product-header'>Order ID</th>
                    <th class='product-header'>Description</th>
                    <th class='product-header'>Total</th>
                    <th class='product-header'>Status</th>
                    <th class='product-header'>Date</th>
                </tr>";
                    }
                    ?>
                </thead>
                <tbody>
                    <?php
                    $user_id = emailTaken($conn, $_SESSION["email"])['user_id'];
                    if ((emailTaken($conn, $_SESSION["email"]))['privilege'] != '0') {
                        $sql = "SELECT * FROM orders";
                    } else {
                        $sql = "SELECT * FROM orders WHERE user_id = $user_id";
                    }
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $order_id = $row['order_id'];
                            $user_id = $row['user_id'];
                            $description = $row['description'];
                            $total = $row['total'];
                            $status = $row['status'];
                            $date = $row['date'];
                            if ((emailTaken($conn, $_SESSION["email"]))['privilege'] != '0') {
                                echo '<tr class="product-row">
                                <td class="product-data">' . $order_id . '</td>
                                <td class="product-data">' . $user_id . '</td>
                                <td class="product-data">' . $description . '</td>
                                <td class="product-data">€' . $total . '</td>
                                <td class="product-data"> ' . $status . '</td>
                                <td class="product-data">' . $date . '</td>
                                </tr>';
                            } else {
                                echo '<tr class="product-row">
                                <td class="product-data">' . $order_id . '</td>
                                <td class="product-data">' . $description . '</td>
                                <td class="product-data">€' . $total . '</td>
                                <td class="product-data"> ' . $status . '</td>
                                <td class="product-data">' . $date . '</td>
                                </tr>';
                            }
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