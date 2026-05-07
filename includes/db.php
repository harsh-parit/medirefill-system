<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "medirefill"
);

if(!$conn){
    die("Database Connection Failed");
}

?>