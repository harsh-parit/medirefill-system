<?php

include "../includes/db.php";

if(isset($_POST['add_customer'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $medical_notes = $_POST['medical_notes'];

    $query = "INSERT INTO customers
    (name, phone, email, age, address, medical_notes)

    VALUES

    ('$name', '$phone', '$email', '$age',
    '$address', '$medical_notes')";

    $result = mysqli_query($conn, $query);

    if($result){

        echo "<script>
        alert('Customer Added Successfully');
        window.location.href='add.php';
        </script>";

    } else {

        echo "<script>
        alert('Failed To Add Customer');
        </script>";

    }

}

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

    <?php include "../includes/navbar.php"; ?>

    <div class="form-container">

        <h3 class="mb-4">Add Customer</h3>

        <form action="" method="POST">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="mb-2">Full Name</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="mb-2">Phone Number</label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           required>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="mb-2">Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="mb-2">Age</label>

                    <input type="number"
                           name="age"
                           class="form-control"
                           required>
                </div>

            </div>

            <div class="mb-3">

                <label class="mb-2">Address</label>

                <textarea name="address"
                          class="form-control"
                          rows="3"
                          required></textarea>

            </div>

            <div class="mb-3">

                <label class="mb-2">Medical Notes</label>

                <textarea name="medical_notes"
                          class="form-control"
                          rows="3"></textarea>

            </div>

            <button type="submit"
                    name="add_customer"
                    class="btn btn-primary mt-2">

                Add Customer

            </button>

        </form>

    </div>

</div>

</body>
</html>