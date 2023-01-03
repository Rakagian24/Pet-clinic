<?php
if(isset($_GET['id'])) {
    include "connection_210036.php";
    $password = password_hash($_GET['type'], PASSWORD_DEFAULT);
    $query="UPDATE users_210036 SET password_210036='$password' WHERE userid_210036='$_GET[id]'";
    $update=mysqli_query($db_connection,$query);
    if($update) {
        echo "<script>alert('Reset Password Successed !')</script>";
    }   else {
        echo "<script>alert('Reset Password Failed !')</script>";
    }
}
?>
<script>window.location.replace("read_users_210036.php");</script>