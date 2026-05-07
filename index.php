<?php

session_start();

include 'includes/config.php';

if(isset($_SESSION['admin'])){
    header("Location: " . BASE_URL . "dashboard.php");
} else {
    header("Location: " . BASE_URL . "login.php");
}

?>