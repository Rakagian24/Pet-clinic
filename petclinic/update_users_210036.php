<?php
if (isset($_POST['save'])) { //cek variable post from form 
     include "connection_210036.php"; // call connection php mysql

     // sql query UPDATE SET WHERE
     $query = "UPDATE users_210036 SET 
            username_210036 = '$_POST[username_210036]',
            password_210036 = '$_POST[password_210036]',
            usertype_210036 = '$_POST[usertype_210036]',
            fullname_210036 = '$_POST[fullname_210036]' 
            WHERE userid_210036 = '$_POST[userid_210036]' 
            ";


     // run query 
     $update = mysqli_query($db_connection, $query);

     if ($update) { //chech if query succes
          // echo "<p>user updated Succesfully !</p>";
          echo "<script>alert ('user updated succesfully !') </script>";
     } else {
          // echo "<p>user updated failed !</p>";
          echo "<script>alert ('user updated failed !') </script>";
     }
}
?>


<!-- <p><a href="read_user_210036.php">BACK TO userS LIST</a></p> -->
<script>window.location.replace("read_users_210036.php");</script>