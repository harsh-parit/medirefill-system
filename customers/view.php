<?php

include "../includes/db.php";

$query = "SELECT * FROM customers ORDER BY customer_id DESC";

$result = mysqli_query($conn, $query);

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

    <?php include "../includes/navbar.php"; ?>

    <div class="table-section">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3>All Customers</h3>

            <a href="add.php" class="btn btn-primary">
                Add Customer
            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                    <?php

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)){

                    ?>

                    <tr>

                        <td><?php echo $row['customer_id']; ?></td>

                        <td><?php echo $row['name']; ?></td>

                        <td><?php echo $row['phone']; ?></td>

                        <td><?php echo $row['email']; ?></td>

                        <td><?php echo $row['age']; ?></td>

                        <td><?php echo $row['address']; ?></td>

                        <td>

                            <a href="edit.php?id=<?php echo $row['customer_id']; ?>"
                               class="btn btn-sm btn-warning">

                               Edit

                            </a>

                            <a href="delete.php?id=<?php echo $row['customer_id']; ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Are you sure you want to delete this customer?')">

                               Delete

                            </a>

                        </td>

                    </tr>

                    <?php

                        }

                    } else {

                        echo "
                        <tr>
                            <td colspan='7' class='text-center'>
                                No Customers Found
                            </td>
                        </tr>
                        ";

                    }

                    ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>