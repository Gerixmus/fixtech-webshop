<?php include_once('header.php');?>

<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
?>

<body>
    <div class="page">
        <?php include('navbar.php');?>

        <table class="table" style="background-color: white;">
        <thead>
            <?php if((emailTaken($conn,$_SESSION["email"]))['privilege']!='0')
            {
                echo"<tr>
                    <th scope='col'>Order ID</th>
                    <th scope='col'>User ID</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Total</th>
                    <th scope='col'>Status</th>
                    <th scope='col'>Date</th>
                </tr>";
            }
            else {
                echo"<tr>
                    <th scope='col'>Order ID</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Total</th>
                    <th scope='col'>Status</th>
                    <th scope='col'>Date</th>
                </tr>";
            }
            ?>
        </thead>
        <tbody>
            <?php
            $user_id = emailTaken($conn,$_SESSION["email"])['user_id'];
            if((emailTaken($conn,$_SESSION["email"]))['privilege']!='0'){
                $sql = "SELECT * FROM orders";
            }
            else {
                $sql = "SELECT * FROM orders WHERE user_id = $user_id";
            }
            $result = mysqli_query($conn,$sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $order_id = $row['order_id'];
                    $user_id = $row['user_id'];
                    $description = $row['description'];
                    $total = $row['total'];
                    $status = $row['status'];
                    $date = $row['date'];
                    if((emailTaken($conn,$_SESSION["email"]))['privilege']!='0')
                    {
                    echo '<tr><th scope="row">'.$order_id.'</th>
                    <td>'.$user_id.'</td>
                    <td>'.$description.'</td>
                    <td>€'.$total.'</td>
                    <td> '.$status.'</td>
                    <td>'.$date.'</td>
                    </tr>';
                    }
                    else {
                        echo '<tr><th scope="row">'.$order_id.'</th>
                    <td>'.$description.'</td>
                    <td>€'.$total.'</td>
                    <td> '.$status.'</td>
                    <td>'.$date.'</td>
                    </tr>';
                    }
                }
            }
            ?>
        </tbody>
    </table>

        <?php include('footer.php');?>
    </div>
</body>
</html>