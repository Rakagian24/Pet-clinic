<?php
if (isset($_GET['id'])) { //cek variable GET from URL 
     include "connection_210036.php"; // call connection php mysql

     // sql query DELETE FROM  WHERE  
     $query = " DELETE FROM doctors_210036 WHERE doctor_id_210036 ='$_GET[id]'";


     // run query 
     $delete = mysqli_query($db_connection, $query);

     if ($delete) { //chech if query succes
          // echo "<p>doctor deleted Succesfully !</p>";
          echo "<script>alert ('doctor deleted succesfully !') </script>";
     } else {
          // echo "<p>doctor deleted failed !</p>";
          echo "<script>alert ('doctor deleted failed !') </script>";
     }
}
?>


<!-- <p><a href="read_doctor_210036.php">BACK TO doctors LIST</a></p> -->
<script>window.location.replace("read_doctors_210036.php");</script>