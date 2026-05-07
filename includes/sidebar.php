<?php include_once 'config.php'; ?>

<div class="sidebar">

    <div class="logo">

        <h2>
            <i class="fa-solid fa-capsules"></i>
            MediRefill
        </h2>

    </div>

    <ul class="menu">

        <!-- DASHBOARD -->

        <li>

            <a href="<?php echo BASE_URL; ?>dashboard.php">

                <i class="fa-solid fa-house"></i>

                <span>Dashboard</span>

            </a>

        </li>

        <!-- CUSTOMERS -->

        <li class="has-submenu">

            <div class="menu-title">

                <i class="fa-solid fa-users"></i>

                <span>Customers</span>

            </div>

            <ul class="submenu">

                <li>
                    <a href="<?php echo BASE_URL; ?>customers/add.php">

                        Add Customer

                    </a>
                </li>

                <li>
                    <a href="<?php echo BASE_URL; ?>customers/view.php">

                        View Customers

                    </a>
                </li>

            </ul>

        </li>

        <!-- MEDICINES -->

        <li class="has-submenu">

            <div class="menu-title">

                <i class="fa-solid fa-capsules"></i>

                <span>Medicines</span>

            </div>

            <ul class="submenu">

                <li>
                    <a href="<?php echo BASE_URL; ?>medicines/add.php">

                        Add Medicine

                    </a>
                </li>

                <li>
                    <a href="<?php echo BASE_URL; ?>medicines/view.php">

                        View Medicines

                    </a>
                </li>

            </ul>

        </li>

        <!-- PRESCRIPTIONS -->

        <li class="has-submenu">

            <div class="menu-title">

                <i class="fa-solid fa-file-medical"></i>

                <span>Prescriptions</span>

            </div>

            <ul class="submenu">

                <li>
                    <a href="<?php echo BASE_URL; ?>prescriptions/add.php">

                        Add Prescription

                    </a>
                </li>

                <li>
                    <a href="<?php echo BASE_URL; ?>prescriptions/view.php">

                        View Prescriptions

                    </a>
                </li>

            </ul>

        </li>

        <!-- REFILL ALERTS -->

        <li>

            <a href="<?php echo BASE_URL; ?>dashboard.php">

                <i class="fa-solid fa-bell"></i>

                <span>Refill Alerts</span>

            </a>

        </li>

        <!-- LOGOUT -->

        <li>

            <a href="<?php echo BASE_URL; ?>logout.php">

                <i class="fa-solid fa-right-from-bracket"></i>

                <span>Logout</span>

            </a>

        </li>

    </ul>

</div>