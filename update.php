<?php include_once('header.php');?>
<?php include ('includes/dbh.inc.php');?>

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
        
        <div class="update">
            <?php
            if(isset($_GET['updateid'])){
                $id = $_GET['updateid'];
                $sql = "SELECT * FROM user WHERE user_id = $id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $user_id = $row['user_id'];
                $privilege = $row['privilege'];
                $name = $row['name'];
                $surname = $row['surname'];
                $email = $row['email'];
                $phone_no = $row['phone_no'];
                $active = $row['active'];
                echo "<form action='includes/update_user.inc.php' method='post'>
                <label for='user_id'>User ID</label><br>
                <input type='text' id='user_id' name='user_id' value=$user_id readonly><br>
                <label for='privilege'>Privilege</label><br>
                <input type='text' id='privilege' name='privilege' value=$privilege><br>
                <label for='name'>Name</label><br>
                <input type='text' id='name' name='name' value=$name><br>
                <label for='surname'>Surname</label><br>
                <input type='text' id='surname' name='surname' value=$surname><br>
                <label for='email'>Email</label><br>
                <input type='text' id='email' name='email' value=$email><br>
                <label for='phone_no'>Phone number</label><br>
                <input type='text' id='phone_no' name='phone_no' value=$phone_no><br>
                <label for='active'>Active</label><br>
                <input type='text' id='active' name='active' value=$active><br><br>
                <input type='submit' name='submit' value='Update'><button><a href='change.php?updateid=".$id."'>Change password</a></button>
            </form>";
            }
            ?>
        </div>

        <?php include('footer.php');?>
    </div>
</body>
</html>