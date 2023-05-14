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
                $user_id=$_GET['updateid'];
                echo "<form action='includes/change.inc.php' method='post'>
                    <label for='user_id'>User ID</label><br>
                    <input type='text' id='user_id' name='user_id' value=$user_id readonly><br>
                    <label for='password'>New password</label><br>
                    <input type='text' id='password' name='password' value=''><br>
                    <input type='submit' name='submit' value='Update'>
                </form>";
            }
            ?>

        </div>

        <?php include('footer.php');?>
    </div>
</body>
</html>