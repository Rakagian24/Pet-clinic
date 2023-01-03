<?php
if (isset($_POST['save'])) {
 	include "connection_210036.php";

 	$query = "INSERT INTO medicals_210036 SET
 			  pet_id_210036 = '$_POST[pet_id_210036]',
 			  doctor_id_210036 = '$_POST[doctor_id_210036]',
 			  symptom_210036 = '$_POST[symptom_210036]',
 			  diagnose_210036 = '$_POST[diagnose_210036]',
 			  treatment_210036 = '$_POST[treatment_210036]',
 			  cost_210036 = '$_POST[cost_210036]'";

 	$create = mysqli_query($db_connection, $query);

 	if($create) {
		echo "<script> alert('Medical Added Successfully !'); </script> ";
	}else{
		echo "<script> alert('Medical Add failed !'); </script>";
	}
}
?>
<script>window.location.replace("medicals_210036.php?pet_id=<?= $_POST['pet_id_210036'];?>");</script>