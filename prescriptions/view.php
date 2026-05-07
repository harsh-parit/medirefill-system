<?php

include "../includes/db.php";

$query = "SELECT prescriptions.*,

customers.name AS customer_name,

medicines.medicine_name AS medicine_name

FROM prescriptions

JOIN customers
ON prescriptions.customer_id = customers.customer_id

JOIN medicines
ON prescriptions.medicine_id = medicines.medicine_id

ORDER BY prescriptions.prescription_id DESC";

$result = mysqli_query($conn, $query);

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

    <?php include "../includes/navbar.php"; ?>

    <div class="table-section">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3>All Prescriptions</h3>

            <a href="add.php" class="btn btn-primary">
                Add Prescription
            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Medicine</th>
                        <th>Quantity</th>
                        <th>Dosage/Day</th>
                        <th>Start Date</th>
                        <th>Next Refill</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    <?php

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)){

                            $today = date('Y-m-d');

                            if($row['next_refill_date'] < $today){

                                $status = "<span class='badge bg-danger'>
                                Overdue
                                </span>";

                            } elseif($row['next_refill_date'] == $today){

                                $status = "<span class='badge bg-warning text-dark'>
                                Due Today
                                </span>";

                            } else {

                                $status = "<span class='badge bg-success'>
                                Upcoming
                                </span>";

                            }

                    ?>

                    <tr>

                        <td><?php echo $row['prescription_id']; ?></td>

                        <td><?php echo $row['customer_name']; ?></td>

                        <td><?php echo $row['medicine_name']; ?></td>

                        <td><?php echo $row['quantity']; ?></td>

                        <td><?php echo $row['dosage_per_day']; ?></td>

                        <td><?php echo $row['start_date']; ?></td>

                        <td><?php echo $row['next_refill_date']; ?></td>

                        <td><?php echo $status; ?></td>

                    </tr>

                    <?php

                        }

                    } else {

                        echo "
                        <tr>
                            <td colspan='8' class='text-center'>
                                No Prescriptions Found
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
