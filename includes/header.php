<?php include_once 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>MediRefill</title>

    <!-- Favicon -->

    <link rel="icon"
          type="image/png"
          href="<?php echo BASE_URL; ?>assets/images/logo.png">

    <!-- Google Fonts -->

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- MAIN CSS -->

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>assets/css/style.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>assets/css/add.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>assets/css/edit.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>assets/css/view.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>assets/css/delete.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>assets/css/sidebar.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>assets/css/navbar.css">

    <!-- CUSTOM STYLE -->

    <style>

        body{
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
            overflow-x: hidden;
        }

        .main-wrapper{
            display: flex;
            width: 100%;
        }

    </style>

</head>

<body>

<div class="main-wrapper">
