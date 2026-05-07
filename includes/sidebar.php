<?php include 'config.php'; ?>

<div class="sidebar">

    <!-- LOGO -->

    <div class="logo">
        <h2>
            <i class="fa-solid fa-capsules"></i>
            MediRefill
        </h2>
    </div>

    <!-- MENU -->

    <ul class="menu">

        <!-- DASHBOARD -->

        <li>
            <a href="<?php echo BASE_URL; ?>dashboard.php">

                <i class="fa-solid fa-house"></i>

                Dashboard

            </a>
        </li>

        <!-- CUSTOMERS -->

        <li class="dropdown-btn">

            <i class="fa-solid fa-users"></i>

            Customers

            <span>▼</span>

        </li>

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

        <!-- MEDICINES -->

        <li class="dropdown-btn">

            <i class="fa-solid fa-capsules"></i>

            Medicines

            <span>▼</span>

        </li>

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

        <!-- PRESCRIPTIONS -->

        <li class="dropdown-btn">

            <i class="fa-solid fa-file-medical"></i>

            Prescriptions

            <span>▼</span>

        </li>

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

        <!-- REFILL ALERTS -->

        <li>
            <a href="<?php echo BASE_URL; ?>dashboard.php">

                <i class="fa-solid fa-bell"></i>

                Refill Alerts

            </a>
        </li>

        <!-- LOGOUT -->

        <li>
            <a href="<?php echo BASE_URL; ?>logout.php">

                <i class="fa-solid fa-right-from-bracket"></i>

                Logout

            </a>
        </li>

    </ul>

</div>

<!-- SIDEBAR DROPDOWN SCRIPT -->

<script>

const dropdowns = document.querySelectorAll(".dropdown-btn");

dropdowns.forEach(dropdown => {

    dropdown.addEventListener("click", () => {

        dropdown.classList.toggle("active");

        const submenu = dropdown.nextElementSibling;

        if(submenu.style.display === "block"){

            submenu.style.display = "none";

        } else {

            submenu.style.display = "block";

        }

    });

});

</script>