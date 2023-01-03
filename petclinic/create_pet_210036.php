<!-- ini pemangilan dari name yang ada di form -->

<!-- // echo $_POST['pet_name_210036'] . "<br>";
// echo $_POST['pet_type_210036'] . "<br>";
// echo $_POST['pet_gender_210036'] . "<br>";
// echo $_POST['pet_age_210036'] . "<br>";
// echo $_POST['pet_owner_210036'] . "<br>";
// echo $_POST['pet_address_210036'] . "<br>";
// echo $_POST['pet_phone_210036'] . "<br>"; -->


<!-- !-- table: dontors_210036
column :
doctor_id_210036 int A_I PRIMARY
doctor_name_210036 varchar 50
doctor_gender_210036 varchar 6
doctor_address_210036 varchar 100
doctor_phone_210036 varchar 15 --> 
<?php
if (isset($_POST['save'])) { //cek variable post from form 
     include "connection_210036.php"; // call connection php mysql

     // sql query insert into
     $query = "INSERT INTO pets_210036 (pet_name_210036,pet_type_210036,pet_gender_210036,pet_age_210036,pet_owner_210036,pet_address_210036,pet_phone_210036) 
     VALUES ('$_POST[pet_name_210036]',
          '$_POST[pet_type_210036]', 
          '$_POST[pet_gender_210036]', 
          '$_POST[pet_age_210036]', 
          '$_POST[pet_owner_210036]', 
          '$_POST[pet_address_210036]', 
          '$_POST[pet_phone_210036]')"; 


     // run query 
     $create = mysqli_query($db_connection, $query);

     if ($create) { //chech if query succes
          // echo "<p>Pet Added Succesfully !</p>";
          echo "<script>alert ('pet added succesfully !') </script>";
     } else {
          // echo "<p>Pet Added failed !</p>";
          echo "<script>alert ('pet added failed !') </script>";
     }
}
?>


<!-- <p><a href="read_pet_210036.php">BACK TO PETS LIST</a></p> -->
<script>window.location.replace("read_pet_210036.php");</script>