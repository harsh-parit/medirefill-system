<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

    <?php include "../includes/navbar.php"; ?>

    <div class="form-container">

        <h3 class="mb-4">Add Customer</h3>

        <form>

            <div class="row">

                <div class="col-md-6">
                    <label>Full Name</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col-md-6">
                    <label>Phone Number</label>
                    <input type="text" class="form-control">
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control">
                </div>

                <div class="col-md-6">
                    <label>Age</label>
                    <input type="number" class="form-control">
                </div>

            </div>

            <label>Address</label>
            <textarea class="form-control"></textarea>

            <label>Medical Notes</label>
            <textarea class="form-control"></textarea>

            <button class="btn btn-primary mt-3">
                Add Customer
            </button>

        </form>

    </div>

</div>

</body>

</html>