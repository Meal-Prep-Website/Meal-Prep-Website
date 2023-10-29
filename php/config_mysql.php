<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
require_once 'classes.php';

//mysql login
$servername = 'localhost';
$username = 'username';
$password = 'password';
$dbname = 'mpdb';

$conn = mysqli_connect($servername, $username, $password,$dbname);

/*
//postgres login

$servername = 'localhost';
$username = 'postgres';
$password = 'Firefighting*Gym00';
$dbname = 'mpdb';
$portnum = '5432';

$conn = odbc_connect("DRIVER={Devart ODBC Driver for PostgreSQL};Server=$servername;Database=$dbname;Port=$portnum;String Types=Unicode", $username, $password);
*/

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>