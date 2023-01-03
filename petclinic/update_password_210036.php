<?php
session_start();
if(isset($_POST['change'])){
    include "connection_210036.php";

    $password = password_hash($_POST['new_password_210036'],PASSWORD_DEFAULT);

    $query = "UPDATE users_210036 SET password_210036='$password' WHERE userid_210036='$_SESSION[userid]'";

    $update = mysqli_query($db_connection,$query);

    if($update){
        $_SESSION['password']=$password;
        echo "<script> alert('Change Password Success!'); window.location.replace('index.php');</script>";
    } else {
        echo "<script> alert('Change Password Failed!'); window.location.replace('change_password_210036.php');</script>";
    }
}