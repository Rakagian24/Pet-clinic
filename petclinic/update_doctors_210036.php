<?php
if (isset($_POST['save'])) { //cek variable post from form 
     include "connection_210036.php"; // call connection php mysql

     // sql query UPDATE SET WHERE
     $query = "UPDATE doctors_210036 SET 
            doctor_name_210036 = '$_POST[doctor_name_210036]',
            doctor_gender_210036 = '$_POST[doctor_gender_210036]',
            doctor_address_210036 = '$_POST[doctor_address_210036]',
            doctor_phone_210036 = '$_POST[doctor_phone_210036]' 
            WHERE doctor_id_210036 = '$_POST[doctor_id_210036]' 
            ";


     // run query 
     $update = mysqli_query($db_connection, $query);

     if ($update) { //chech if query succes
          // echo "<p>Pet updated Succesfully !</p>";
          echo "<script>alert ('Doctor Updated Succesfully !') </script>";
     } else {
          // echo "<p>Pet updated failed !</p>";
          echo "<script>alert ('Doctor Updated Failed !') </script>";
     }
}
?>


<!-- <p><a href="read_pet_210036.php">BACK TO PETS LIST</a></p> -->
<script>window.location.replace("read_doctors_210036.php");</script>