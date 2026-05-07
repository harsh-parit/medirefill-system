<?php

session_start();

session_destroy();

include 'includes/config.php';

header("Location: " . BASE_URL . "login.php");

?>