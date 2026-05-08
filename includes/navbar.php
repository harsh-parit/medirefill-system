<div class="topbar">

    <div class="topbar-left">
        <h4>Smart Pharmacy Refill System</h4>
    </div>

    <div class="topbar-right">

        

        <!-- ADMIN DROPDOWN -->

        <div class="admin-dropdown">

            <button class="admin-btn">

                <i class="fa-solid fa-user"></i>
                Admin
                <i class="fa-solid fa-caret-down"></i>

            </button>

            <div class="admin-dropdown-content">

                <a href="../admin/profile.php">

                    <i class="fa-solid fa-user"></i>
                    My Profile

                </a>

                <a href="../logout.php" class="text-danger">

                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout

                </a>

            </div>

        </div>

    </div>

</div>


<style>

.admin-dropdown{
    position: relative;
    display: inline-block;
    z-index: 99999;
}

.admin-btn{

    background: white;
    border: none;
    padding: 10px 16px;
    border-radius: 8px;
    font-weight: 500;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    cursor: pointer;
}

.admin-dropdown-content{

    display: none;
    position: absolute;
    right: 0;
    top: 50px;

    background: white;
    min-width: 200px;

    box-shadow: 0 4px 12px rgba(0,0,0,0.15);

    border-radius: 10px;

    overflow: hidden;

    z-index: 99999;
}

.admin-dropdown-content a{

    display: block;
    padding: 12px 16px;
    text-decoration: none;
    color: #333;
    transition: 0.3s;
}

.admin-dropdown-content a:hover{
    background: #f5f5f5;
}

.admin-dropdown:hover .admin-dropdown-content{
    display: block;
}

.topbar{
    overflow: visible !important;
}

</style>