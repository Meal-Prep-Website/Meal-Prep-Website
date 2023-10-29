<?php
// Include config file
require_once 'config_mysql.php';
//mysql login


$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();

if (array_key_exists('username',$_SESSION)){
    $sql="select login from users where login = '".$_SESSION['username']."';";
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
        //$conn->close();
    echo json_encode($emparray);
        // Close connection
    mysqli_close($conn);
}
else{
    echo json_encode('You must be logged in to see your own stats.');
}


?>