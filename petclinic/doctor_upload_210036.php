<?php
if(isset($_POST['upload'])) {
	include "connection_210036.php";
	
	$folder = 'upload/doctors/';
	if(move_uploaded_file($_FILES['new_photo_210036']['tmp_name'], $folder . $_FILES['new_photo_210036']['name'])) {
		
		$photo=$_FILES['new_photo_210036']['name'];
		$query="UPDATE doctors_210036 SET doctor_photo_210036='$photo' WHERE doctor_id_210036='$_POST[doctor_id_210036]'";
		$upload=mysqli_query($db_connection,$query);
		
		if($upload) {
			if($_POST['doctor_photo_210036'] !== 'default.png') unlink($folder . $_POST['doctor_photo_210036']);
			echo "<script>alert('Change Photo Success !');window.location.replace('read_doctors_210036.php');</script>";
		} else {
			echo "<script>alert('Change Photo Failed !');window.location.replace('doctor_photo_210036?id=$_POST[doctor_id_210036]');</script>";
		}
	} else {
		echo "<script>alert('Upload Photo Successed !');window.location.replace('doctor_photo_210036.php?id=$_POST[doctor_id_210036]');</script>";
	}
}