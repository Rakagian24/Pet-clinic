<?php
if(isset($_POST['upload'])) {
    include "connection_210036.php";

    $folder = 'upload/pets/';
    if(move_uploaded_file($_FILES['new_photo_210036']['tmp_name'], $folder . $_FILES['new_photo_210036']['name'])) {

        $photo=$_FILES['new_photo_210036']['name'];

        $query="UPDATE pets_210036 SET pet_photo_210036='$photo' WHERE pet_id_210036='$_POST[pet_id_210036]'";

        $upload=mysqli_query($db_connection,$query);

        if($upload) {
            if ($_POST['pet_photo_210036'] !== 'default.png') unlink($folder . $_POST['pet_photo_210036']);

            echo "<script>alert('Change Photo Successed !');window.location.replace('read_pet_210036.php');</script>";
        } else {

            echo "<script>alert('Change Photo Failed !');window.location.replace('pet_photo_210036.php?id=$_POST[pet_id_210036]');</script>";
        }
    } else {
        echo "<script>alert('Upload Photo Failed !');window.location.replace('pet_photo_210036.php?id=$_POST[pet_id_210036]');</script>";
    }
}