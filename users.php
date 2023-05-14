<?php include_once('header.php');?>
<?php 
include 'includes/dbh.inc.php';
?>
<?php
    session_start();
    require_once 'includes/functions.inc.php';
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
    elseif((emailTaken($conn,$_SESSION["email"]))['privilege']!='1'){
        header('location: index.php');
    }
?>

<body>
    <div class="page">
        <?php include('navbar.php');?>
        <div class="users">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">UID</th>
                <th scope="col">Privilege</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone no</th>
                <th scope="col">Active</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM user";
            $result = mysqli_query($conn,$sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $user_id = $row['user_id'];
                    $privilege = $row['privilege'];
                    $name = $row['name'];
                    $surname = $row['surname'];
                    $email = $row['email'];
                    $phone_no = $row['phone_no'];
                    $active = $row['active'];
                    echo '<tr><th scope="row">'.$user_id.'</th>
                    <td>'.$privilege.'</td>
                    <td>'.$name.'</td>
                    <td>'.$surname.'</td>
                    <td>'.$email.'</td>
                    <td>'.$phone_no.'</td>
                    <td>'.$active.'</td>
                    <td><button><a href="update.php?updateid='.$user_id.'">Update</a></button>
                    </tr>';
                }
            }
            ?>
        </tbody>
    </table>
        </div>
        <?php include('footer.php');?>
    </div>
</body>
</html>