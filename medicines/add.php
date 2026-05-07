<?php

include "../includes/db.php";

$success = "";
$error = "";

if(isset($_POST['add_medicine'])){

    $medicine_name = $_POST['medicine_name'];
    $medicine_type = $_POST['medicine_type'];
    $stock_quantity = $_POST['stock_quantity'];
    $expiry_date = $_POST['expiry_date'];
    $refill_days = $_POST['refill_days'];
    $price = $_POST['price'];

    $query = "INSERT INTO medicines
    (medicine_name, medicine_type, stock_quantity, expiry_date, refill_days, price)

    VALUES

    ('$medicine_name', '$medicine_type', '$stock_quantity', '$expiry_date', '$refill_days', '$price')";

    $result = mysqli_query($conn, $query);

    if($result){

    $success = "Medicine Added Successfully";

} else {

    $error = "Failed To Add Medicine";

}


}

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

    <?php include "../includes/navbar.php"; ?>

    <div class="form-container">

        <h3 class="mb-4">Add Medicine</h3>
        <?php if($success != ""){ ?>

    <div
        id="success-alert"
        class="alert alert-success">

        <?php echo $success; ?>

    </div>

<?php } ?>

<?php if($error != ""){ ?>

    <div
        id="error-alert"
        class="alert alert-danger">

        <?php echo $error; ?>

    </div>

<?php } ?>

        <form action="" method="POST">

            <div class="row">

                <div class="row">

    <div class="col-md-6">

        <label>Medicine Name</label>

        <input
        type="text"
        name="medicine_name"
        class="form-control">

    </div>

    <div class="col-md-6">

        <label>Stock Quantity</label>

        <input
        type="number"
        name="stock_quantity"
        class="form-control">

    </div>

</div>


<div class="row mt-3">

    <div class="col-md-6">

        <label>Medicine Type</label>

        <select
        name="category"
        class="form-control">

            <option value="Tablet">Tablet</option>
            <option value="Capsule">Capsule</option>
            <option value="Injection">Injection</option>
            <option value="Syrup">Syrup</option>
            <option value="Medical Equipment">Medical Equipment</option>

        </select>

    </div>

</div>


<div class="row mt-3">

    <div class="col-md-4">

        <label>Expiry Date</label>

        <input
        type="date"
        name="expiry_date"
        class="form-control">

    </div>

    <div class="col-md-4">

        <label>Refill Days</label>

        <input
        type="number"
        name="refill_days"
        class="form-control">

    </div>

    <div class="col-md-4">

        <label>Price</label>

        <input
        type="number"
        step="0.01"
        name="price"
        class="form-control">

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
<script>

setTimeout(() => {

    const successAlert =
    document.getElementById("success-alert");

    if(successAlert){

        successAlert.style.display = "none";

    }

}, 3000);



setTimeout(() => {

    const errorAlert =
    document.getElementById("error-alert");

    if(errorAlert){

        errorAlert.style.display = "none";

    }

}, 3000);

</script>
</body>
</html>