<?php
if(isset($_POST['upload'])) {
	include "connection_210036.php";
	
	$folder = 'upload/users/';
	if(move_uploaded_file($_FILES['new_photo_210036']['tmp_name'], $folder . $_FILES['new_photo_210036']['name'])) {
		
		$photo=$_FILES['new_photo_210036']['name'];
		$query="UPDATE users_210036 SET photo_210036='$photo' WHERE userid_210036='$_POST[userid_210036]'";
		$upload=mysqli_query($db_connection,$query);
		
		if($upload) {
			if($_POST['photo_210036'] !== 'default.png') unlink($folder . $_POST['photo_210036']);
			echo "<script>alert('Change Photo Success !');window.location.replace('index.php');</script>";
		} else {
			echo "<script>alert('Change Photo Failed !');window.location.replace('change_photo_210036.php?id=$_POST[userid_210036]');</script>";
		}
	} else {
		echo "<script>alert('Upload Photo Successed !');window.location.replace('change_photo_210036.php?id=$_POST[userid_210036]');</script>";
	}
}