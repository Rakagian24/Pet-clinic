<!-- untuk mengkoneksikan mysql dengan crud -->

<?php
$db_host="localhost"; //database server name
$db_username="root"; //databse username
$db_password=""; //database password
$db_name="petclinic"; //database name

// connect to mysql , if error will stop program (die)
$db_connection = mysqli_connect($db_host,$db_username,$db_password) or die;


// select active database
mysqli_select_db($db_connection,$db_name);
?>