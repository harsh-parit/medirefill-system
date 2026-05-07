<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MediRefill Login</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="assets/css/login.css">

</head>

<body>

    <div class="login-container">

        <div class="login-card">

            <!-- LEFT SIDE -->

            <div class="login-left">

                <div class="overlay"></div>

                <div class="left-content">

                    <h1>MediRefill</h1>

                    <p>
                        Smart Pharmacy Refill &
                        Wellness Reminder System
                    </p>

                    <div class="features">

                        <div class="feature">
                            <i class="fa-solid fa-bell"></i>
                            <span>Auto Refill Alerts</span>
                        </div>

                        <div class="feature">
                            <i class="fa-solid fa-capsules"></i>
                            <span>Medicine Tracking</span>
                        </div>

                        <div class="feature">
                            <i class="fa-solid fa-heart-pulse"></i>
                            <span>Wellness Monitoring</span>
                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT SIDE -->

            <div class="login-right">

                <div class="login-form-box">

                    <h2>Welcome Back 👋</h2>

                    <p class="sub-text">
                        Login to your admin dashboard
                    </p>

                    <form action="login_process.php" method="POST">

                        <div class="input-box">

                            <label>Email Address</label>

                            <div class="input-field">
                                <i class="fa-solid fa-envelope"></i>

                                <input type="email" name="email" placeholder="Enter your email" required>
                            </div>

                        </div>

                        <div class="input-box">

                            <label>Password</label>

                            <div class="input-field">

                                <i class="fa-solid fa-lock"></i>

                                <input type="password" name="password" placeholder="Enter your password" required>

                            </div>

                        </div>

                        <button type="submit" class="login-btn">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</body>

</html>