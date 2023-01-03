<?php
		session_start();
		//call connection
		include "connection_210036.php";
		
		//query select
		$query = "SELECT * FROM users_210036 WHERE userid_210036= '$_SESSION[userid]'";
		
		//run query
		$user=mysqli_query($db_connection,$query);
		
		//extract data
		$data=mysqli_fetch_assoc($user);
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
            <li>
            <?php
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
    <h6 class="heading">Change Photo</h6>
    <?php 
      //call connection php mysql
      include "connection_210036.php";

      //make query SELECT FROM WHERE
      $query="SELECT * FROM doctors_210036 WHERE doctor_id_210036='$_GET[id]'";

      //run query
      $pet=mysqli_query($db_connection,$query);

      //extract data from query result
      $data=mysqli_fetch_assoc($pet);
    ?>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="pet_photo_210036.php">Change Photo Pet</a></li>
    </ul>
  </section>
</div>
<!-- End Top Background Image Wrapper -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div id="comments">
        <h2>Change Photo</h2>
        <form method="post" action="doctor_upload_210036.php" enctype="multipart/form-data">
          <div class="one_third first">
            <img class="imgl borderedbox inspace-5" src="upload/doctors/<?=$data['doctor_photo_210036']; ?>">
            <label for="name">New Photo :</label>
            <input type="file" name="new_photo_210036" required>
          </div>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <div>
            <input type="submit" name="upload" value="Upload">
            <input type="hidden" name="doctor_photo_210036" value="<?=$data['doctor_photo_210036']?>" />
            <input type="hidden" name="doctor_id_210036" value="<?=$data['doctor_id_210036']?>" />
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