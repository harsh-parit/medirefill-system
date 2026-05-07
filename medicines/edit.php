<?php

include "../includes/db.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "SELECT * FROM medicines
              WHERE medicine_id = '$id'";

    $result = mysqli_query($conn, $query);

    $medicine = mysqli_fetch_assoc($result);

} else {

    header("Location: view.php");

}

if(isset($_POST['update_medicine'])){

    $medicine_name = $_POST['medicine_name'];
    $stock_quantity = $_POST['stock_quantity'];
    $expiry_date = $_POST['expiry_date'];
    $refill_days = $_POST['refill_days'];
    $price = $_POST['price'];

    $update_query = "UPDATE medicines SET

    medicine_name = '$medicine_name',
    stock_quantity = '$stock_quantity',
    expiry_date = '$expiry_date',
    refill_days = '$refill_days',
    price = '$price'

    WHERE medicine_id = '$id'
    ";

    $update_result = mysqli_query($conn, $update_query);

    if($update_result){

        echo "<script>
        alert('Medicine Updated Successfully');
        window.location.href='view.php';
        </script>";

    } else {

        echo "<script>
        alert('Failed To Update Medicine');
        </script>";

    }

}

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

    <?php include "../includes/navbar.php"; ?>

    <div class="form-container">

        <h3 class="mb-4">Edit Medicine</h3>

        <form action="" method="POST">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="mb-2">Medicine Name</label>

                    <input type="text"
                           name="medicine_name"
                           class="form-control"
                           value="<?php echo $medicine['medicine_name']; ?>"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="mb-2">Stock Quantity</label>

                    <input type="number"
                           name="stock_quantity"
                           class="form-control"
                           value="<?php echo $medicine['stock_quantity']; ?>"
                           required>

                </div>

            </div>

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label class="mb-2">Expiry Date</label>

                    <input type="date"
                           name="expiry_date"
                           class="form-control"
                           value="<?php echo $medicine['expiry_date']; ?>"
                           required>

                </div>

                <div class="col-md-4 mb-3">

                    <label class="mb-2">Refill Days</label>

                    <input type="number"
                           name="refill_days"
                           class="form-control"
                           value="<?php echo $medicine['refill_days']; ?>"
                           required>

                </div>

                <div class="col-md-4 mb-3">

                    <label class="mb-2">Price</label>

                    <input type="number"
                           step="0.01"
                           name="price"
                           class="form-control"
                           value="<?php echo $medicine['price']; ?>"
                           required>

                </div>

            </div>

            <button type="submit"
                    name="update_medicine"
                    class="btn btn-success">

                Update Medicine

            </button>

        </form>

    </div>

</div>

</body>
</html>