<?php

include "../includes/db.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "DELETE FROM customers
              WHERE customer_id = '$id'";

    $result = mysqli_query($conn, $query);

    if($result){

        echo "<script>
        alert('Customer Deleted Successfully');
        window.location.href='view.php';
        </script>";

    } else {

        echo "<script>
        alert('Failed To Delete Customer');
        window.location.href='view.php';
        </script>";

    }

} else {

    header("Location: view.php");

}

?>