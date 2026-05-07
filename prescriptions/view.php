<?php

include "../includes/db.php";

$query = "

SELECT prescriptions.*,

customers.name AS customer_name

FROM prescriptions

JOIN customers
ON prescriptions.customer_id = customers.customer_id

ORDER BY prescriptions.prescription_id DESC

";

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
                    <th>Start Date</th>
                    <th>Items</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                <?php

                if(mysqli_num_rows($result) > 0){

                    while($row = mysqli_fetch_assoc($result)){

                        $prescription_id =
                        $row['prescription_id'];



                        // GET PRESCRIPTION ITEMS

                        $items_query = "

                        SELECT prescription_items.*,

                        medicines.medicine_name

                        FROM prescription_items

                        JOIN medicines
                        ON prescription_items.medicine_id =
                        medicines.medicine_id

                        WHERE prescription_items.prescription_id =
                        '$prescription_id'

                        ";

                        $items_result =
                        mysqli_query($conn, $items_query);



                        $status =
                        "<span class='badge bg-success'>
                        Active
                        </span>";

                ?>

                <tr>

                    <td>

                        <?php echo $prescription_id; ?>

                    </td>

                    <td>

                        <?php echo $row['customer_name']; ?>

                    </td>

                    <td>

                        <?php echo $row['start_date']; ?>

                    </td>

                    <td>

                        <?php

                        while($item =
                        mysqli_fetch_assoc($items_result)){

                            echo "

                            <div class='mb-2 p-2 border rounded'>

                                <strong>

                                ".$item['medicine_name']."

                                </strong>

                                <br>

                                Qty:
                                ".$item['quantity']."

                                |

                                Dosage:
                                ".$item['dosage_per_day']."

                                /day

                                <br>

                                Refill:
                                ".$item['next_refill_date']."

                            </div>

                            ";

                        }

                        ?>

                    </td>

                    <td>

                        <?php echo $status; ?>

                    </td>

                    <td>

                        <a
                            href='edit.php?id=<?php echo $prescription_id; ?>'

                            class='btn btn-success btn-sm mb-2'>

                            Edit

                        </a>

                        <br>

                        <a
                            href='delete.php?id=<?php echo $prescription_id; ?>'

                            class='btn btn-danger btn-sm'

                            onclick="return confirm(
                            'Are you sure you want to delete this prescription?'
                            )">

                            Delete

                        </a>

                    </td>

                </tr>

                <?php

                    }

                } else {

                    echo "

                    <tr>

                        <td colspan='6' class='text-center'>

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