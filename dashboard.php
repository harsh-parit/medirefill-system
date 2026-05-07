<?php

include 'includes/auth.php';
include "includes/db.php";



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

                    <tr>
                        <td>Raj</td>
                        <td>Paracetamol</td>
                        <td>07-05-2026</td>
                        <td>
                            <span class="badge-pending">
                                Pending
                            </span>
                        </td>
                        <td>
                            <button class="btn-custom btn-view">
                                View
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>Rahul</td>
                        <td>Vitamin D</td>
                        <td>08-05-2026</td>
                        <td>
                            <span class="badge-completed">
                                Completed
                            </span>
                        </td>
                        <td>
                            <button class="btn-custom btn-view">
                                View
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>Anjali</td>
                        <td>Insulin</td>
                        <td>05-05-2026</td>
                        <td>
                            <span class="badge-overdue">
                                Overdue
                            </span>
                        </td>
                        <td>
                            <button class="btn-custom btn-view">
                                View
                            </button>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <!-- LOW STOCK -->

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

                    <tr>
                        <td>Amoxicillin</td>
                        <td>5</td>
                        <td>
                            <span class="badge-overdue">
                                LOW STOCK
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td>Dolo 650</td>
                        <td>3</td>
                        <td>
                            <span class="badge-overdue">
                                LOW STOCK
                            </span>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>