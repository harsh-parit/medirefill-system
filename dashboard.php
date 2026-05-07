<?php
include 'includes/auth.php';
?>

<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>

<div class="content">

    <?php include "includes/navbar.php"; ?>

    <!-- DASHBOARD CARDS -->

    <div class="dashboard-cards">

        <div class="card-box blue">
            <i class="fa-solid fa-users text-primary"></i>
            <h2>245</h2>
            <p>Total Customers</p>
        </div>

        <div class="card-box green">
            <i class="fa-solid fa-capsules text-success"></i>
            <h2>120</h2>
            <p>Total Medicines</p>
        </div>

        <div class="card-box orange">
            <i class="fa-solid fa-calendar-check text-warning"></i>
            <h2>18</h2>
            <p>Today's Refills</p>
        </div>

        <div class="card-box red">
            <i class="fa-solid fa-triangle-exclamation text-danger"></i>
            <h2>7</h2>
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
                        <td><span class="badge-pending">Pending</span></td>
                        <td>
                            <button class="btn-custom btn-view">View</button>
                        </td>
                    </tr>

                    <tr>
                        <td>Rahul</td>
                        <td>Vitamin D</td>
                        <td>08-05-2026</td>
                        <td><span class="badge-completed">Completed</span></td>
                        <td>
                            <button class="btn-custom btn-view">View</button>
                        </td>
                    </tr>

                    <tr>
                        <td>Anjali</td>
                        <td>Insulin</td>
                        <td>05-05-2026</td>
                        <td><span class="badge-overdue">Overdue</span></td>
                        <td>
                            <button class="btn-custom btn-view">View</button>
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
                            <span class="badge-overdue">LOW STOCK</span>
                        </td>
                    </tr>

                    <tr>
                        <td>Dolo 650</td>
                        <td>3</td>
                        <td>
                            <span class="badge-overdue">LOW STOCK</span>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>

</html>