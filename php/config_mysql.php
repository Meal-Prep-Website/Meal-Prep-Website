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



// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>