<?php

include "../includes/db.php";

$query = "

SELECT prescription_items.*,

prescriptions.prescription_id,

customers.name AS customer_name,
customers.phone AS customer_phone,

medicines.medicine_name

FROM prescription_items

JOIN prescriptions
ON prescription_items.prescription_id =
prescriptions.prescription_id

JOIN customers
ON prescriptions.customer_id =
customers.customer_id

JOIN medicines
ON prescription_items.medicine_id =
medicines.medicine_id

ORDER BY prescription_items.next_refill_date ASC

";

$result = mysqli_query($conn, $query);

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

<?php include "../includes/navbar.php"; ?>

<div class="table-section">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>

            Refill Alerts

        </h3>

    </div>

    <div class="table-responsive">

        <table class="table table-hover">

            <thead class="table-dark">

                <tr>

                    <th>Prescription ID</th>
                    <th>Customer</th>
                    <th>Phone</th>
                    <th>Medicine</th>
                    <th>Quantity</th>
                    <th>Dosage/Day</th>
                    <th>Next Refill</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                <?php

                if(mysqli_num_rows($result) > 0){

                    while($row =
                    mysqli_fetch_assoc($result)){

                        $today = date('Y-m-d');



                        if(
                            $row['next_refill_date']
                            <
                            $today
                        ){

                            $status = "

                            <span class='badge bg-danger'>

                                Overdue

                            </span>

                            ";

                        }

                        elseif(
                            $row['next_refill_date']
                            ==
                            $today
                        ){

                            $status = "

                            <span class='badge bg-warning text-dark'>

                                Due Today

                            </span>

                            ";

                        }

                        else {

                            $status = "

                            <span class='badge bg-success'>

                                Upcoming

                            </span>

                            ";

                        }

                ?>

                <tr>

                    <td>

                        #<?php echo $row['prescription_id']; ?>

                    </td>

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

                        <?php echo $row['quantity']; ?>

                    </td>

                    <td>

                        <?php echo $row['dosage_per_day']; ?>

                    </td>

                    <td>

                        <?php echo $row['next_refill_date']; ?>

                    </td>

                    <td>

                        <?php echo $status; ?>

                    </td>

                    <td>

<?php

$phone =
preg_replace(
    '/[^0-9]/',
    '',
    $row['customer_phone']
);

if(strlen($phone) == 10){

    $phone = "91".$phone;

}

$message =

"Hello ".$row['customer_name'].

", your refill for ".$row['medicine_name'].

" is due on ".$row['next_refill_date'].

". Please visit MediRefill Pharmacy.";

$encoded_message =
urlencode($message);

?>

<a

href="https://wa.me/<?php echo $phone; ?>?text=<?php echo $encoded_message; ?>"

target="_blank"

class="btn btn-success btn-sm">

    <i class="fa-brands fa-whatsapp"></i>

    Send WhatsApp

</a>

</td>

                </tr>

                <?php

                    }

                } else {

                    echo "

                    <tr>

                        <td colspan='9' class='text-center'>

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

    alert(
    'Reminder Sent Successfully!'
    );

}

</script>

</body>
</html>