<?php

include "../includes/db.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "SELECT * FROM customers
              WHERE customer_id = '$id'";

    $result = mysqli_query($conn, $query);

    $customer = mysqli_fetch_assoc($result);

} else {

    header("Location: view.php");

}

if(isset($_POST['update_customer'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $medical_notes = $_POST['medical_notes'];

    $update_query = "UPDATE customers SET

    name = '$name',
    phone = '$phone',
    email = '$email',
    age = '$age',
    address = '$address',
    medical_notes = '$medical_notes'

    WHERE customer_id = '$id'
    ";

    $update_result = mysqli_query($conn, $update_query);

    if($update_result){

        echo "<script>
        alert('Customer Updated Successfully');
        window.location.href='view.php';
        </script>";

    } else {

        echo "<script>
        alert('Failed To Update Customer');
        </script>";

    }

}

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

    <?php include "../includes/navbar.php"; ?>

    <div class="form-container">

        <h3 class="mb-4">Edit Customer</h3>

        <form action="" method="POST">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="mb-2">Full Name</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="<?php echo $customer['name']; ?>"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="mb-2">Phone Number</label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="<?php echo $customer['phone']; ?>"
                           required>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="mb-2">Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="<?php echo $customer['email']; ?>"
                           required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="mb-2">Age</label>

                    <input type="number"
                           name="age"
                           class="form-control"
                           value="<?php echo $customer['age']; ?>"
                           required>

                </div>

            </div>

            <div class="mb-3">

                <label class="mb-2">Address</label>

                <textarea name="address"
                          class="form-control"
                          rows="3"
                          required><?php echo $customer['address']; ?></textarea>

            </div>

            <div class="mb-3">

                <label class="mb-2">Medical Notes</label>

                <textarea name="medical_notes"
                          class="form-control"
                          rows="3"><?php echo $customer['medical_notes']; ?></textarea>

            </div>

            <button type="submit"
                    name="update_customer"
                    class="btn btn-success">

                Update Customer

            </button>

        </form>

    </div>

</div>

</body>
</html>