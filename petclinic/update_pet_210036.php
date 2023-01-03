<?php
if (isset($_POST['save'])) { //cek variable post from form 
     include "connection_210036.php"; // call connection php mysql

     // sql query UPDATE SET WHERE
     $query = "UPDATE pets_210036 SET 
            pet_name_210036 = '$_POST[pet_name_210036]',
            pet_type_210036 = '$_POST[pet_type_210036]',
            pet_gender_210036 = '$_POST[pet_gender_210036]',
            pet_age_210036 = '$_POST[pet_age_210036]',
            pet_owner_210036 = '$_POST[pet_owner_210036]',
            pet_address_210036 = '$_POST[pet_address_210036]',
            pet_phone_210036 = '$_POST[pet_phone_210036]' 
            WHERE pet_id_210036 = '$_POST[pet_id_210036]' 
            ";


     // run query 
     $update = mysqli_query($db_connection, $query);

     if ($update) { //chech if query succes
          // echo "<p>Pet updated Succesfully !</p>";
          echo "<script>alert ('pet updated succesfully !') </script>";
     } else {
          // echo "<p>Pet updated failed !</p>";
          echo "<script>alert ('pet updated failed !') </script>";
     }
}
?>


<!-- <p><a href="read_pet_210036.php">BACK TO PETS LIST</a></p> -->
<script>window.location.replace("read_pet_210036.php");</script>