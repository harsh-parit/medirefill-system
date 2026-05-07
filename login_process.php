<?php

session_start();

include 'includes/db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users 
          WHERE email='$email' 
          AND password='$password'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){

    $_SESSION['admin'] = $email;

    include 'includes/config.php';
    
    header("Location: " . BASE_URL . "dashboard.php");

} else {

    echo "Invalid Email or Password";

}

?>