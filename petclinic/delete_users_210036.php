<?php
if (isset($_GET['id'])) { //cek variable GET from URL 
     include "connection_210036.php"; // call connection php mysql

     // sql query DELETE FROM  WHERE  
     $query = " DELETE FROM users_210036 WHERE userid_210036 ='$_GET[id]'";


     // run query 
     $delete = mysqli_query($db_connection, $query);

     if ($delete) { //chech if query succes
          // echo "<p>User deleted Succesfully !</p>";
          echo "<script>alert ('User deleted succesfully !') </script>";
     } else {
          // echo "<p>User deleted failed !</p>";
          echo "<script>alert ('User deleted failed !') </script>";
     }
}
?>


<!-- <p><a href="read_User_210036.php">BACK TO Users LIST</a></p> -->
<script>window.location.replace("read_users_210036.php");</script>