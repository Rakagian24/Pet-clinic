<!DOCTYPE html>
<html>
<head>
    <title>Raka Pet Clinic</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
	include "connection_210036.php";                //call connection
    $query = "SELECT * From pets_210036";           //make a sql query       
	$pets = mysqli_query($db_connection, $query);   //run query
	?>
	<h1>Pets</h1>
	<table border="1" width="50%" align="center">
		<?php $i=0;  //inisiasi data per baris ?>
		<tr>
		<?php foreach ($pets as $data) : //loop data -> <td> ?> 
		<td width = "33%" align="center">
			<img src="1.jpg" width="200" height="200"><br>
			<strong> <?=$data['pet_name_210036'] ?> </strong><br>
			<a href="buy.php">Buy</a>
		</td>
		<?php
		$i++; 	//pencatatan data per baris 
		if($i==2) { 	//cek data per baris
			echo '</tr><tr>'; //jika sudah penuh akan pindah ke baris berikutnya
			$i=0; //pencatat data per baris kembali ke 0 
		}
		?>
		<?php endforeach; //akhir loop data ?>
		</tr>
		</table>
</body>
</html>