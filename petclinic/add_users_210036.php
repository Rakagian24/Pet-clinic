<?php
session_start();
if(!isset($_SESSION['login'])) {
    echo "<script>alert('Please Login First !');window.location.replace('form_login_210036.php');</script>";
}
if($_SESSION['usertype'] != 'Manager') {
    echo "<script>alert('Access Forbidden !');window.location.replace('index.php');</script>";
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
                <li><a href="read_users_210036.php">User List</a></li>
                <li><a href="report.php">Monthly Report</a></li>
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
    <h6 class="heading">Add New User</h6>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="read_users_210036.php">User List</a></li>
      <li><a href="add_users_210036.php">Add User</a></li>
    </ul>
  </section>
</div>
<!-- End Top Background Image Wrapper -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div id="comments">
        <h2>Form Add User</h2>
        <form action="create_users_210036.php" method="post">
          <div class="one_third first">
            <label for="name">Username <span>*</span></label>
            <input type="text" name="username_210036" id="username" value="" size="22" required>
          </div>
          <div class="one_third">
            <label for="gender">Type <span>*</span></label>
            <input type="radio" name="usertype_210036" id="radio" value="" size="22" required> Manager
            <input type="radio" name="usertype_210036" id="radio" value="" size="22" required> Staff
          </div>
          <div class="one_third">
            <label for="name">Fullname <span>*</span></label>
            <input type="text" name="fullname_210036" id="fullname" value="" size="22" required>
          </div>
          <br><br><br><br><br><br><br><br>
          <div>
            <input type="submit" name="save" value="Submit Form">
            &nbsp;
            <input type="reset" name="reset" value="Reset Form">
          </div>
        </form>
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