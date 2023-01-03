<?php
if (isset($_GET['id'])) { //cek variable GET from URL 
     include "connection_210036.php"; // call connection php mysql

     // sql query DELETE FROM  WHERE  
     $query = " DELETE FROM pets_210036 WHERE pet_id_210036 ='$_GET[id]'";


     // run query 
     $delete = mysqli_query($db_connection, $query);

     if ($delete) { //chech if query succes
          // echo "<p>Pet deleted Succesfully !</p>";
          echo "<script>alert ('pet deleted succesfully !') </script>";
     } else {
          // echo "<p>Pet deleted failed !</p>";
          echo "<script>alert ('pet deleted failed !') </script>";
     }
}
?>


<!-- <p><a href="read_pet_210036.php">BACK TO PETS LIST</a></p> -->
<script>window.location.replace("read_pet_210036.php");</script>