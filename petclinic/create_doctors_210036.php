<?php
if (isset($_POST['save'])) { //cek variable post from form 
    include "connection_210036.php"; // call connection php mysql

    // sql query insert into
    $query = "INSERT INTO doctors_210036 (doctor_name_210036,doctor_gender_210036,doctor_address_210036,doctor_phone_210036) 
     VALUES ('$_POST[doctor_name_210036]',
          '$_POST[doctor_gender_210036]',  
          '$_POST[doctor_address_210036]', 
          '$_POST[doctor_phone_210036]')";


    // run query 
    $create = mysqli_query($db_connection, $query);

    if ($create) { //chech if query succes
        // echo "<p>doctor Added Succesfully !</p>";
        echo "<script>alert ('doctor added succesfully !') </script>";
    } else {
        // echo "<p>doctor Added failed !</p>";
        echo "<script>alert ('doctor added failed !') </script>";
    }
}
?>


<!-- <p><a href="read_doctor_210036.php">BACK TO doctorS LIST</a></p> -->
<script>
    window.location.replace("read_doctors_210036.php");
</script>