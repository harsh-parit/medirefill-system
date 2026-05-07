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

    header("Location: dashboard.php");

} else {

    echo "Invalid Email or Password";

}

?>