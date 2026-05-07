<?php

include 'includes/auth.php';
include 'includes/db.php';


/* =========================
   DASHBOARD COUNTS
========================= */

$total_customers_query =
"SELECT COUNT(*) AS total_customers FROM customers";

$total_customers_result =
mysqli_query($conn, $total_customers_query);

$total_customers =
mysqli_fetch_assoc($total_customers_result)['total_customers'];



$total_medicines_query =
"SELECT COUNT(*) AS total_medicines FROM medicines";

$total_medicines_result =
mysqli_query($conn, $total_medicines_query);

$total_medicines =
mysqli_fetch_assoc($total_medicines_result)['total_medicines'];



$today = date('Y-m-d');

$today_refills_query =
"SELECT COUNT(*) AS today_refills
FROM prescriptions
WHERE next_refill_date = '$today'";

$today_refills_result =
mysqli_query($conn, $today_refills_query);

$today_refills =
mysqli_fetch_assoc($today_refills_result)['today_refills'];



$low_stock_query =
"SELECT COUNT(*) AS low_stock
FROM medicines
WHERE stock_quantity <= 10";

$low_stock_result =
mysqli_query($conn, $low_stock_query);

$low_stock =
mysqli_fetch_assoc($low_stock_result)['low_stock'];



/* =========================
   UPCOMING REFILLS
========================= */

$upcoming_refills_query = "

SELECT prescriptions.*,
customers.name AS customer_name,
medicines.medicine_name AS medicine_name

FROM prescriptions

JOIN customers
ON prescriptions.customer_id = customers.customer_id

JOIN medicines
ON prescriptions.medicine_id = medicines.medicine_id

ORDER BY prescriptions.next_refill_date ASC

LIMIT 5

";

$upcoming_refills_result =
mysqli_query($conn, $upcoming_refills_query);



/* =========================
   LOW STOCK MEDICINES
========================= */

$low_stock_medicines_query = "

SELECT *
FROM medicines
WHERE stock_quantity <= 10
ORDER BY stock_quantity ASC

";

$low_stock_medicines_result =
mysqli_query($conn, $low_stock_medicines_query);

?>

<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>

<div class="content">

    <?php include "includes/navbar.php"; ?>

    <!-- DASHBOARD CARDS -->

    <div class="dashboard-cards">

        <div class="card-box blue">
            <i class="fa-solid fa-users text-primary"></i>
            <h2><?php echo $total_customers; ?></h2>
            <p>Total Customers</p>
        </div>

        <div class="card-box green">
            <i class="fa-solid fa-capsules text-success"></i>
            <h2><?php echo $total_medicines; ?></h2>
            <p>Total Medicines</p>
        </div>

        <div class="card-box orange">
            <i class="fa-solid fa-calendar-check text-warning"></i>
            <h2><?php echo $today_refills; ?></h2>
            <p>Today's Refills</p>
        </div>

        <div class="card-box red">
            <i class="fa-solid fa-triangle-exclamation text-danger"></i>
            <h2><?php echo $low_stock; ?></h2>
            <p>Low Stock Alerts</p>
        </div>

    </div>

    <!-- UPCOMING REFILLS -->

    <div class="table-section">

        <h4 class="table-title">Upcoming Refills</h4>

        <div class="table-responsive">

            <table class="table table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>Customer</th>
                        <th>Medicine</th>
                        <th>Refill Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    <?php
                    if(mysqli_num_rows($upcoming_refills_result) > 0){

                        while($row = mysqli_fetch_assoc($upcoming_refills_result)){

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
                            <?php echo $row['medicine_name']; ?>
                        </td>

                        <td>
                            <?php echo $row['next_refill_date']; ?>
                        </td>

                        <td>
                            <?php echo $status; ?>
                        </td>

                        <td>

                            <a href="prescriptions/view.php"
                               class="btn btn-sm btn-primary">

                               View

                            </a>

                        </td>

                    </tr>

                    <?php
                        }

                    } else {
                    ?>

                    <tr>
                        <td colspan="5" class="text-center">
                            No Upcoming Refills
                        </td>
                    </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- LOW STOCK MEDICINES -->

    <div class="table-section">

        <h4 class="table-title">Low Stock Medicines</h4>

        <div class="table-responsive">

            <table class="table table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>Medicine</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    <?php
                    if(mysqli_num_rows($low_stock_medicines_result) > 0){

                        while($medicine = mysqli_fetch_assoc($low_stock_medicines_result)){
                    ?>

                    <tr>

                        <td>
                            <?php echo $medicine['medicine_name']; ?>
                        </td>

                        <td>
                            <?php echo $medicine['stock_quantity']; ?>
                        </td>

                        <td>

                            <span class="badge bg-danger">
                                LOW STOCK
                            </span>

                        </td>

                    </tr>

                    <?php
                        }

                    } else {
                    ?>

                    <tr>
                        <td colspan="3" class="text-center">
                            No Low Stock Medicines
                        </td>
                    </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>