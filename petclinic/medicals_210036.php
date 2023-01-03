<?php
session_start();
if(!isset($_SESSION['login'])) {
    echo "<script>alert('Please Login First !');window.location.replace('form_login_210036.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="">
<head>
  <title>Raka Pet Clinic</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="style/layout.css" rel="stylesheet" type="text/css" media="all">
  </head>
  <body id="top">
  <!-- Top Background Image Wrapper -->
  <div class="bgded overlay" style="background-image:url('images/03.jpg');"> 
    
    <div class="wrapper row1">
      <header id="header" class="hoc clear"> 
        
        <div id="logo" class="fl_left">
          <h1><a href="index.html">Pet Clinic</a></h1>
        </div>
        <nav id="mainav" class="fl_right">
          <ul class="clear">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a class="drop" href="#">Pages</a>
              <ul>
                <li><a href="read_pet_210036.php">Pet List</a></li>
                <li><a href="read_doctors_210036.php">Doctor List</a></li>
                <?php if($_SESSION['usertype']=='Manager') { ?>
                  <li><a href="read_users_210036.php">User List</a></li>
                  <li><a href="report.php">Monthly Report</a></li>
                  <?php }?>
              </ul>
            </li>
            <li><a class="drop" href="#">User</a>
              <ul>
                <li><a href="change_photo_210036.php">Change Photo</a></li>
                <li><a href="change_password_210036.php">Change Password</a></li>
                <li><a href="logout_210036.php">Logout</a></li>
              </ul>
            </li>
            <li><?php
          include "connection_210036.php";
          $query = "SELECT * FROM users_210036 WHERE userid_210036= '$_SESSION[userid]'";
          $user = mysqli_query($db_connection, $query); 
          $data = mysqli_fetch_assoc($user);
          ?>
          <img src="upload/users/<?= $data['photo_210036']; ?>" style="width:50px;height:50px;"></li>
          </ul>
        </nav>
        
      </header>
  </div>
  <section id="breadcrumb" class="hoc clear">   
    <h6 class="heading">Medical Report</h6>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="read_pet_210036.php">Pet List</a></li>
      <li><a href="report_210036.php">Medical Report</a></li>
    </ul>
  </section>
</div>
<!-- End Top Background Image Wrapper -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <h1>Medical Report</h1>
      <?php
        include "connection_210036.php";                                             // call connection

        $querypet="SELECT * FROM pets_210036 WHERE pet_id_210036 = '$_GET[pet_id]'";        // make query SELECT FROM WHERE

        $pet=mysqli_query($db_connection, $querypet);                                   // Run Query

        $data1=mysqli_fetch_assoc($pet);

        $querymed="SELECT * FROM medicals_210036 AS m, doctors_210036 AS d WHERE m.pet_id_210036 = '$_GET[pet_id]' AND m.doctor_id_210036 = d.doctor_id_210036";

        $medicals=mysqli_query($db_connection, $querymed);
    ?>
      <img class="imgr borderedbox inspace-5" src="upload/pets/<?php echo $data1['pet_photo_210036']; ?>" style="width:200px;height:150px;">
      <p>Pet Id/Name            : <?=$data1['pet_id_210036']?> / <?=$data1['pet_name_210036']?> </p>
      <p>Pet Type/Gender/Age    : <?=$data1['pet_type_210036']?> / <?=$data1['pet_gender_210036']?> / <?=$data1['pet_age_210036']?> </p>
      <p>Owner                  : <?=$data1['pet_owner_210036']?> / <?=$data1['pet_address_210036']?> / <?=$data1['pet_phone_210036']?> </p>
      <div class="scrollable">
        <table>
        <a href="add_medicals_210036.php?pet_id=<?=$data1['pet_id_210036']?>">Add New Record</a>
          <thead>
            <tr>
              <th>No</th>
              <th>Date</th>
              <th>Doctor</th>
              <th>Symptom</th>
              <th>Diagnose</th>
              <th>Treatment</th>
              <th>Cost ($)</th>
            </tr>
          </thead>
          <?php
            if(mysqli_num_rows($medicals) > 0) {
                $i=1;
                foreach($medicals as $data2) : 
        ?>
          <tbody>
            <tr>
              <td> <?=$i++?></td>
              <td> <?= date('D, d-M-Y H:i:s', strtotime($data2['mr_date_210036']))?></td>
              <td> <?=$data2['doctor_name_210036']?> </td>
              <td> <?=$data2['symptom_210036']?> </td>
              <td> <?=$data2['diagnose_210036']?> </td>
              <td> <?=$data2['treatment_210036']?> </td>
              <td> <?=$data2['cost_210036']?> </td>
            </tr>
            <?php
            endforeach;
            } else {
        ?>
        
        <!-- will show the data empty -->
        
        <tr><td colspan="7" align='center'>No Record !</td></tr>
        <?php
            }
        ?>
        </table>
      </div>
</div>
        
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    
    <p class="fl_left">Copyright &copy; 2022 - All Rights Reserved - <a href="index.php">petclinic.com</a></p>
    <p class="fl_right">Raka Gian Aditya Asbath</a></p>
    
  </div>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="scripts/jquery.min.js"></script>
<script src="scripts/jquery.backtotop.js"></script>
<script src="scripts/jquery.mobilemenu.js"></script>
</body>
</html>