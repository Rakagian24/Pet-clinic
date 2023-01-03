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
    <h6 class="heading">Monthly Report</h6>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="read_users_210036.php">Monthly Report</a></li>
    </ul>
  </section>
</div>
<!-- End Top Background Image Wrapper -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <h1>Monthly Report</h1>
      <?php 
      $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
      $year = date('Y');
      ?>
      <form>
          <p style="display:flex;">Select: 
          <select name="month" required>
                  <option value="">Month</option>
                  <?php for($m=1;$m<=12;$m++) { ?>
                  <option value="<?=$m?>"><?=$months[$m-1]?></option>
                  <?php } ?>
              </select>

              <select name="year" required>
                  <option value="">Year</option>
                  <?php for($y=0;$y<=2;$y++) { ?>
                  <option value="<?=$year-$y?>"><?=$year-$y?></option>
                  <?php } ?>
              </select>
            </p>
            <input type="submit" value="View Report">
      </form>
      <div class="scrollable">
      <?php
        if(isset($_GET['year'])) {
            include 'connection_210036.php';
            //$query="SELECT * FROM medicals_210036";
            $query="SELECT m.mr_date_210036, d.doctor_name_210036, p.pet_name_210036, p.pet_owner_210036, m.cost_210036 FROM medicals_210036 AS m, doctors_210036 AS d, pets_210036 AS p WHERE m.doctor_id_210036=d.doctor_id_210036 AND m.pet_id_210036=p.pet_id_210036 AND MONTH(m.mr_date_210036)='$_GET[month]' AND YEAR(m.mr_date_210036)='$_GET[year]'";
            $report=mysqli_query($db_connection,$query);
      ?>
        <h4>Report periode <?=$months[$_GET['month']-1]?> - <?=$_GET['year']?></h4>
        <table>
        <a href="add_users_210036.php">Add New Users</a>
          <thead>
            <tr>
              <th>No</th>
              <th>Date</th>
              <th>Doctor</th>
              <th>Pet</th>
              <th>Owner</th>
              <th>Pay (Rp)</th>
            </tr>
          </thead>
          <?php
          if(mysqli_num_rows($report) > 0) {
              $i=1; $total=0;
              foreach($report as $data) :
                  $total=$total+$data['cost_210036']
          ?>
          <tbody>
            <tr>
              <td><?=$i++?></td>
              <td><?=$data['mr_date_210036']?></td>
              <td><?=$data['doctor_name_210036']?></td>
              <td><?=$data['pet_name_210036']?></td>
              <td><?=$data['pet_owner_210036']?></td>
              <td align="right"><?=$data['cost_210036']?></td>
            </tr>
            <?php endforeach; ?>
            <tr><th colspan="7" align="right">Total : Rp. <?=$total?></th></tr>
            <?php } else { ?>
            <tr><td colspan="7" align="center">No record !</td></tr>
            <?php } ?>
        </table>
        <?php } ?>
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