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
          <h1><a href="index.php">Pet Clinic</a></h1>
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
    <h6 class="heading">Pet List</h6>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="read_pet_210036.php">Pet List</a></li>
    </ul>
  </section>
</div>
<!-- End Top Background Image Wrapper -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <h1>Pet List</h1>
      <div class="scrollable">
        <table>
        <a href="add_pet_210036.php">Add New Pet</a>
          <thead>
            <tr>
            <th>No</th>
            <th>Name</th>
            <th>Type</th>
            <th>Gender</th>
            <th>Age (Month)</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Address</th>
            <th>Phone</th>
            <th colspan=2>Action</th>
            </tr>
          </thead>
          <?php

          include "connection_210036.php"; //call connection 
          $query = "SELECT*FROM pets_210036"; // make a sql query
          $pets = mysqli_query($db_connection,$query); //run query


          $i=1; //initial counter for numbering
          foreach ($pets as $data) : //loop to extract data from database
?>
          <tbody>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><a href="medicals_210036.php?pet_id=<?=$data['pet_id_210036']?>"><?php echo $data['pet_name_210036']; ?></a></td>
              <td><?php echo $data['pet_type_210036']; ?></td>
              <td><?php echo $data['pet_gender_210036']; ?></td>
              <td><?php echo $data['pet_age_210036']; ?></td>
              <td align="center">
                  <a href="pet_photo_210036.php?id=<?=$data['pet_id_210036']?>"><img src="upload/pets/<?php echo $data['pet_photo_210036']; ?>" style="width:50px;height:50px;"></a>
              </td>
              <td><?php echo $data['pet_owner_210036']; ?></td>
              <td><?php echo $data['pet_address_210036']; ?></td>
              <td><?php echo $data['pet_phone_210036']; ?></td>
              <td><a href="edit_pet_210036.php?id=<?=$data['pet_id_210036']?>">Edit Pet</a></td>
              <td><a href="delete_pet_210036.php?id=<?=$data['pet_id_210036']?>" onclick="return confirm('Are You Sure?')">Delete Pet</a></td>
            </tr>
        <?php endforeach; ?>
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