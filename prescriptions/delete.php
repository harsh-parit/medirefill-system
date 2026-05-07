<?php

include "../includes/db.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "
    DELETE FROM prescriptions
    WHERE prescription_id = '$id'
    ";

    $result = mysqli_query($conn, $query);

    if($result){

        header("Location: view.php");

    } else {

        echo "Failed To Delete Prescription";

    }

}

?>