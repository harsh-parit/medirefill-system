<?php

include "../includes/db.php";

$customers_query = "SELECT * FROM customers";
$customers_result = mysqli_query($conn, $customers_query);

$medicines_query = "SELECT * FROM medicines";
$medicines_result = mysqli_query($conn, $medicines_query);

if(isset($_POST['add_prescription'])){

    $customer_id = $_POST['customer_id'];
    $medicine_id = $_POST['medicine_id'];
    $quantity = $_POST['quantity'];
    $dosage_per_day = $_POST['dosage_per_day'];
    $start_date = $_POST['start_date'];

    $days = ceil($quantity / $dosage_per_day);

    $next_refill_date = date(
        'Y-m-d',
        strtotime($start_date . " +$days days")
    );

    $query = "INSERT INTO prescriptions

    (customer_id, medicine_id, quantity,
    dosage_per_day, start_date, next_refill_date)

    VALUES

    ('$customer_id', '$medicine_id', '$quantity',
    '$dosage_per_day', '$start_date',
    '$next_refill_date')";

    $result = mysqli_query($conn, $query);

    if($result){

        echo "<script>
        alert('Prescription Added Successfully');
        window.location.href='add.php';
        </script>";

    } else {

        echo "<script>
        alert('Failed To Add Prescription');
        </script>";

    }

}

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

    <?php include "../includes/navbar.php"; ?>

    <div class="form-container">

        <h3 class="mb-4">Add Prescription</h3>

        <form action="" method="POST">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="mb-2">Select Customer</label>

                    <select name="customer_id"
                            class="form-control"
                            required>

                        <option value="">Choose Customer</option>

                        <?php
                        while($customer = mysqli_fetch_assoc($customers_result)){
                        ?>

                        <option value="<?php echo $customer['customer_id']; ?>">

                            <?php echo $customer['name']; ?>

                        </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="mb-2">Select Medicine</label>

                    <select name="medicine_id"
                            class="form-control"
                            required>

                        <option value="">Choose Medicine</option>

                        <?php
                        while($medicine = mysqli_fetch_assoc($medicines_result)){
                        ?>

                        <option value="<?php echo $medicine['medicine_id']; ?>">

                            <?php echo $medicine['medicine_name']; ?>

                        </option>

                        <?php } ?>

                    </select>

                </div>

            </div>

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label class="mb-2">Quantity</label>

                    <input type="number"
                           name="quantity"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-4 mb-3">

                    <label class="mb-2">Dosage Per Day</label>

                    <input type="number"
                           name="dosage_per_day"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-4 mb-3">

                    <label class="mb-2">Start Date</label>

                    <input type="date"
                           name="start_date"
                           class="form-control"
                           required>

                </div>

            </div>

            <button type="submit"
                    name="add_prescription"
                    class="btn btn-primary">

                Add Prescription

            </button>

        </form>

    </div>

</div>

</body>
</html>