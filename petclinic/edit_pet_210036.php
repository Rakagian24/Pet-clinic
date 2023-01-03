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
    <h6 class="heading">Edit Pet</h6>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="read_pet_210036.php">Pet List</a></li>
      <li><a href="edit_pet_210036.php">Edit Pet</a></li>
    </ul>
  </section>
</div>
<!-- End Top Background Image Wrapper -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div id="comments">
        <h2>Form Edit Pet</h2>
        <form action="update_pet_210036.php" method="post" enctype="multipart/form-data">
        <?php
            //call connection php mysql
            include "connection_210036.php";

            //make query SELECT FROM WHERE
            $query="SELECT * FROM pets_210036 where pet_id_210036='$_GET[id]'";

            //run query
            $pet=mysqli_query($db_connection,$query);

            // extract data from query result
            $data=mysqli_fetch_assoc($pet);
        ?>
          <div class="one_third first">
            <label for="name">Name <span>*</span></label>
            <input type="text" name="pet_name_210036" id="name" value="<?=$data['pet_name_210036']?>" size="22" required>
          </div>
          <div class="one_third">
            <label for="gender">Gender <span>*</span></label>
            <input type="radio" name="pet_gender_210036" id="radio" value="Male" <?=($data['pet_gender_210036']=='Male') ?'checked':'';?> size="22" required> Male
            <input type="radio" name="pet_gender_210036" id="radio" value="Female" <?=($data['pet_gender_210036']=='Female') ?'checked':'';?> size="22" required> Female
          </div>
          <div class="one_third">
            <label for="phone">Type <span>*</span></label>
            <select name="pet_type_210036" required>
              <option value="">Choose</option>
              <option value="Cat" <?=($data['pet_type_210036']=='Cat') ?'selected':'';?>>Cat</option>
              <option value="Dog" <?=($data['pet_type_210036']=='Dog') ?'selected':'';?>>Dog</option>
              <option value="Reptil" <?=($data['pet_type_210036']=='Reptil') ?'selected':'';?>>Reptil</option>
              <option value="Bird" <?=($data['pet_type_210036']=='Bird') ?'selected':'';?>>Bird</option>
              <option value="Rodent" <?=($data['pet_type_210036']=='Rodent') ?'selected':'';?>>Rodent</option>
          </select>
          </div>
          <div class="one_third first">
            <label for="age">Age <span>*</span></label>
            <input type="number" name="pet_age_210036" id="age" value="<?=$data['pet_age_210036']?>" size="22">
          </div>
          <div class="one_third">
            <label for="owner">Owner <span>*</span></label>
            <input type="text" name="pet_owner_210036" id="owner" value="<?=$data['pet_owner_210036']?>" size="22">
          </div>
          <div class="one_third">
            <label for="name">Phone <span>*</span></label>
            <input type="text" name="pet_phone_210036" id="name" value="<?=$data['pet_phone_210036']?>" size="22" required>
          </div>
          <div class="block clear">
            <label for="address">Address</label>
            <textarea name="pet_address_210036" id="address" cols="25" rows="10"><?=$data['pet_address_210036']?></textarea>
          </div>
          <div>
            <input type="submit" name="save" value="Submit Form">
            &nbsp;
            <input type="reset" name="reset" value="Reset Form">
            <input type="hidden" name="pet_id_210036" value="<?=$data['pet_id_210036']?>">
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