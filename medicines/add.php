<?php

include "../includes/db.php";

if(isset($_POST['add_medicine'])){

    $medicine_name = $_POST['medicine_name'];
    $stock_quantity = $_POST['stock_quantity'];
    $expiry_date = $_POST['expiry_date'];
    $refill_days = $_POST['refill_days'];
    $price = $_POST['price'];

    $query = "INSERT INTO medicines
    (medicine_name, stock_quantity, expiry_date, refill_days, price)

    VALUES

    ('$medicine_name', '$stock_quantity',
    '$expiry_date', '$refill_days', '$price')";

    $result = mysqli_query($conn, $query);

    if($result){

        echo "<script>
        alert('Medicine Added Successfully');
        window.location.href='add.php';
        </script>";

    } else {

        echo "<script>
        alert('Failed To Add Medicine');
        </script>";

    }

}

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

    <?php include "../includes/navbar.php"; ?>

    <div class="form-container">

        <h3 class="mb-4">Add Medicine</h3>

        <form action="" method="POST">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="mb-2">Medicine Name</label>

                    <input type="text"
                           name="medicine_name"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="mb-2">Stock Quantity</label>

                    <input type="number"
                           name="stock_quantity"
                           class="form-control"
                           required>

                </div>

            </div>

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label class="mb-2">Expiry Date</label>

                    <input type="date"
                           name="expiry_date"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-4 mb-3">

                    <label class="mb-2">Refill Days</label>

                    <input type="number"
                           name="refill_days"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-4 mb-3">

                    <label class="mb-2">Price</label>

                    <input type="number"
                           step="0.01"
                           name="price"
                           class="form-control"
                           required>

                </div>

            </div>

            <button type="submit"
                    name="add_medicine"
                    class="btn btn-primary">

                Add Medicine

            </button>

        </form>

    </div>

</div>

</body>
</html>