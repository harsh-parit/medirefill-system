<?php

include "../includes/auth.php";
include "../includes/db.php";

$query = "

SELECT prescriptions.*,

customers.name AS customer_name,
customers.phone AS customer_phone,

medicines.medicine_name AS medicine_name

FROM prescriptions

JOIN customers
ON prescriptions.customer_id = customers.customer_id

JOIN medicines
ON prescriptions.medicine_id = medicines.medicine_id

ORDER BY prescriptions.next_refill_date ASC

";

$result = mysqli_query($conn, $query);

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

    <?php include "../includes/navbar.php"; ?>

    <div class="table-section">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3>Refill Alerts</h3>

        </div>

        <div class="table-responsive">

            <table class="table table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Medicine</th>
                        <th>Refill Date</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)){

                            $today = date('Y-m-d');

                            if($row['next_refill_date'] < $today){

                                $status =
                                "<span class='badge bg-danger'>
                                Overdue
                                </span>";

                            } elseif($row['next_refill_date'] == $today){

                                $status =
                                "<span class='badge bg-warning text-dark'>
                                Due Today
                                </span>";

                            } else {

                                $status =
                                "<span class='badge bg-success'>
                                Upcoming
                                </span>";

                            }

                    ?>

                    <tr>

                        <td>

                            <?php echo $row['customer_name']; ?>

                        </td>

                        <td>

                            <?php echo $row['customer_phone']; ?>

                        </td>

                        <td>

                            <?php echo $row['medicine_name']; ?>

                        </td>

                        <td>

                            <?php echo $row['next_refill_date']; ?>

                        </td>

                        <td>

                            <?php echo $status; ?>

                        </td>

                        <td>

                            <button
                                class="btn btn-primary btn-sm"
                                onclick="sendReminder()">

                                Send Reminder

                            </button>

                        </td>

                    </tr>

                    <?php

                        }

                    } else {

                        echo "
                        <tr>
                            <td colspan='6' class='text-center'>
                                No Refill Alerts Found
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

<script>

function sendReminder(){

    alert("Reminder Sent Successfully!");

}

</script>

</body>
</html>