<?php

session_start();

include "../includes/db.php";

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
}

$email = $_SESSION['admin'];

$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);

$user = mysqli_fetch_assoc($result);



/* UPDATE PROFILE */

if(isset($_POST['update_profile'])){

    $name = $_POST['name'];
    $new_email = $_POST['email'];

    $update = "UPDATE users
               SET name='$name',
                   email='$new_email'
               WHERE email='$email'";

    if(mysqli_query($conn, $update)){

        $_SESSION['admin'] = $new_email;

        echo "
        <script>
            alert('Profile Updated Successfully');
            window.location='profile.php';
        </script>
        ";

    }

}



/* CHANGE PASSWORD */

if(isset($_POST['change_password'])){

    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $check = "SELECT * FROM users
              WHERE email='$email'
              AND password='$current_password'";

    $check_result = mysqli_query($conn, $check);

    if(mysqli_num_rows($check_result) > 0){

        if($new_password == $confirm_password){

            $change = "UPDATE users
                       SET password='$new_password'
                       WHERE email='$email'";

            mysqli_query($conn, $change);

            echo "
            <script>
                alert('Password Changed Successfully');
                window.location='profile.php';
            </script>
            ";

        } else {

            echo "
            <script>
                alert('New Password and Confirm Password do not match');
            </script>
            ";

        }

    } else {

        echo "
        <script>
            alert('Current Password Incorrect');
        </script>
        ";

    }

}

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

<?php include "../includes/navbar.php"; ?>

<div class="container-fluid mt-4">

    <div class="row">

        <!-- PROFILE CARD -->

        <div class="col-md-4">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <i class="fa-solid fa-user-circle fa-5x text-primary mb-3"></i>

                    <h4><?php echo $user['name']; ?></h4>

                    <p class="text-muted">
                        <?php echo $user['email']; ?>
                    </p>

                    <span class="badge bg-success">
                        <?php echo $user['role']; ?>
                    </span>

                </div>

            </div>

        </div>


        <!-- UPDATE PROFILE -->

        <div class="col-md-8">

            <div class="card shadow border-0 mb-4">

                <div class="card-header bg-primary text-white">

                    <h5 class="mb-0">
                        Update Profile
                    </h5>

                </div>

                <div class="card-body">

                    <form method="POST">

                        <div class="mb-3">

                            <label>Name</label>

                            <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="<?php echo $user['name']; ?>"
                            required>

                        </div>

                        <div class="mb-3">

                            <label>Email</label>

                            <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="<?php echo $user['email']; ?>"
                            required>

                        </div>

                        <button
                        type="submit"
                        name="update_profile"
                        class="btn btn-primary">

                            Update Profile

                        </button>

                    </form>

                </div>

            </div>



            <!-- CHANGE PASSWORD -->

            <div class="card shadow border-0">

                <div class="card-header bg-dark text-white">

                    <h5 class="mb-0">
                        Change Password
                    </h5>

                </div>

                <div class="card-body">

                    <form method="POST">

                        <div class="mb-3">

                            <label>Current Password</label>

                            <input
                            type="password"
                            name="current_password"
                            class="form-control"
                            required>

                        </div>

                        <div class="mb-3">

                            <label>New Password</label>

                            <input
                            type="password"
                            name="new_password"
                            class="form-control"
                            required>

                        </div>

                        <div class="mb-3">

                            <label>Confirm Password</label>

                            <input
                            type="password"
                            name="confirm_password"
                            class="form-control"
                            required>

                        </div>

                        <button
                        type="submit"
                        name="change_password"
                        class="btn btn-dark">

                            Change Password

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

</body>
</html>