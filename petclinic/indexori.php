<?php
session_start();
if(!isset($_SESSION['login'])) {
    echo "<script>alert('Please Login First !');window.location.replace('form_login_210036.php');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Raka Pet Clinic</title>
</head>
<body>
    <h1>Raka Pet Clinic</h1><hr>
    <h3>Welcome to Raka Pet Clinic</h3>

    <p>Choose One of The Options Below</p>
    <ul>
        <li><a href="read_pet_210036.php">Pets List</a></li>
        <li><a href="read_doctors_210036.php">Doctors List</a></li>
        <?php if($_SESSION['usertype']=='Manager') { ?>
        <li><a href="read_users_210036.php">Users List</a></li>
        <li><a href="report.php">Monthly Report</a></li><?php }?>
        <hr>
        <p>Welcome <?=$_SESSION['fullname'];?>, you are login as <?=$_SESSION['usertype'];?></p>
        <?php
        include "connection_210036.php";
        $query = "SELECT * FROM users_210036 WHERE userid_210036= '$_SESSION[userid]'";
        $user = mysqli_query($db_connection, $query); 
        $data = mysqli_fetch_assoc($user);
        ?>
        <p><img src="upload/users/<?= $data['photo_210036']; ?>" width="50" height="50"></p>

        <li><a href="change_photo_210036.php">Change Photo</a></li>
            <li><a href="change_password_210036.php">Change Password</a></li>
            <li><a href="logout_210036.php">Logout</a></li>
    </ul>
    <!-- <h4><a href="read_pet_210036.php">Pets</a></h4>
    <h4></h4> -->
 
</body>
</html>