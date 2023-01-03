<?php
   
if (isset($_POST['save'])){
   include "connection_210036.php"; //call connection php mysql

   // create default password
   $password = password_hash($_POST['usertype_210036'], PASSWORD_DEFAULT);

   // sql query insert into values
   $query = "INSERT INTO users_210036 (username_210036, password_210036, usertype_210036,
   fullname_210036) VALUES ('$_POST[username_210036]', 
   '$password', 
   '$_POST[usertype_210036]',
   '$_POST[fullname_210036]')";

   //run query
   $create = mysqli_query($db_connection, $query);

   if($create) {
      //echo "<p>User added successfully !</p>";
      echo "<script> alert('user added successfully !'); </script>";
   } else {
      //echo "<p>User add failed !</p>";
      echo "<script> alert('User add failed !'); </script>";
   }
}
?>
<!--<p><a href="read_pet_210036.php">BACK TO User LIST</p> -->>
<script>window.location.replace("read_users_210036.php");</script>