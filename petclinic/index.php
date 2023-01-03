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
<div class="bgded overlay" style="background-image:url('images/02.jpg');"> 
  
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
    <section id="pageintro" class="hoc clear">
    <div> 
      
      <h2 class="heading">Pet Clinic</h2>
      <p>Healthy Pets, Happy Pets</p>
      <p>Special Care For Your Pets</p>
      <!-- <footer><a class="btn" href="#">Details</a></footer> -->
      
    </div>
  </section>
  
</div>
<!-- End Top Background Image Wrapper -->



<div class="wrapper row2">
  <section class="hoc container clear">
    <div class="sectiontitle">
      <h6 class="heading">Hello <?=$_SESSION['fullname'];?>, you are login as <?=$_SESSION['usertype'];?></h6>
      <p>Please Choose One of Options Below</p>
    </div>
    <ul class="nospace group services" style="justify-content:center;">
      <li class="one_quarter first">
        <article><a href="read_pet_210036.php"><i class="fa fa-3x fa-500px"></i></a>
          <h6 class="heading font-x1"><a href="read_pet_210036.php">Pets List</a></h6>
          <p>Pets that have been Treated at this Clinic</p>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="read_doctors_210036.php"><i class="fa fa-3x fa-lastfm"></i></a>
          <h6 class="heading font-x1"><a href="read_doctors_210036.php">Doctor List</a></h6>
          <p>Doctors who treat your Pet</p>
        </article>
      </li>
      <?php if($_SESSION['usertype']=='Manager') { ?>
      <li class="one_quarter">
        <article><a href="read_users_210036.php"><i class="fa fa-3x fa-puzzle-piece"></i></a>
          <h6 class="heading font-x1"><a href="read_users_210036.php">Users List</a></h6>
          <p>Workers who Manage this Service</p>
        </article>
      </li>
      <li class="one_quarter">
        <article><a href="report.php"><i class="fa fa-3x fa-ravelry"></i></a>
          <h6 class="heading font-x1"><a href="report.php">Monthly Report</a></h6>
          <p>Monthly Report of Pet Service Financial Records</p>
        </article>
      </li>
      <?php }?>
    </ul>
    
    <div class="clear"></div>
  </section>
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
<!-- <script src="scripts/jquery.mobilemenu.js"></script> -->
</body>
</html>