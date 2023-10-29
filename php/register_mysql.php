<?php
// Include config file
require_once 'config_mysql.php';
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
        echo json_encode($username_err);
        
    } else{
        // Prepare a select statement
        $sql = "SELECT login_id FROM `users` WHERE login = ?";
        try{
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);       
            // Set parameters
            $param_username = trim($_POST["username"]);          
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);   
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                    echo json_encode($username_err);
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo json_encode("Oops! Something went wrong. Please try again later.");
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
        } catch (Exception $e){
            echo 'Caught exception in check: ',  $e->getMessage(), "\n";
        }
    }
    // Validate password
    if(empty(trim($_POST['current-password']))){
        $password_err = "Please enter a password.";
        echo json_encode($password_err);     
    } elseif(strlen(trim($_POST['current-password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
        echo json_encode($password_err);     
    }    // Validate confirm password
    elseif(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';
        echo json_encode($confirm_password_err);     
     
    }    else{
        $password = trim($_POST['current-password']);
        $confirm_password = trim($_POST['confirm_password']);        
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
            echo json_encode($confirm_password_err);     
        }
    } 

    

    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO `users` (login, password_hash) VALUES (?,?)";
        try{ 
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                //header("location: welcome_mysql.php");
                echo json_encode("Account successfully created. Please go to login page and login.");
            } else{
                echo json_encode("Something went wrong. Please try again later.");
                
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
        }catch (Exception $e){
            echo 'Caught exception in insert: ',  $e->getMessage(), "\n";
        }
    }
    // Close connection
    mysqli_close($conn);
}
else{
    echo "incorrect method";
}