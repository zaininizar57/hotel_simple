<?php session_start(); ?>

<?php require_once 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <title>Hotel Hebat</title>
</head>

<body>

    <script>
    let isOpenModalRegister = false;
    let isOpenModalLogin = false;
    </script>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container py-2">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img width="40" src="assets/images/hotel-logo.png" alt="logo-hotel">
                <span class="fw-bold">Hotel Hebat</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cari_kamar.php">Cari Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fasilitas.php">Fasilitas</a>
                    </li>
                    <?php if(isset($_SESSION['auth'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="kamarku.php">Kamarku</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <?php if(isset($_SESSION['auth'])): ?>
                    <li class="nav-link">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['auth']['nama_lengkap'] ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="auth/logout.php">log out</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php else: ?>
                    <li class=" nav-link">
                        <button id="btn-modal-register"
                            class="nav-link btn px-4 text-white btn-primary">Register</button>
                    </li>
                    <li class="nav-link">
                        <button id="btn-modal-login" class="nav-link btn btn-outline-primary px-4">Login</button>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>