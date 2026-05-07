<?php

$conn = mysqli_connect(

    getenv("mysql.railway.internal"),

    getenv("root"),

    getenv("BIZwIvFtrbsQGALnoYPZjMUdCLHlekvw"),

    getenv("railway"),

    getenv("3306")

);

if(!$conn){

    die("Database Connection Failed");

}

?>