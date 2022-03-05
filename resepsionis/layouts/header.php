<?php 

    session_start();

    if (empty($_SESSION['auth'])) {
        header('Location: auth/login.php');
    }else if($_SESSION['auth']['role_id'] !== '2'){
        header('Location: auth/login.php');
    }

    $menu = '';

    $menu_resepsionis_panel_class = 'nav-link text-white';
    $menu_kamar_class = 'nav-link text-white';
    $menu_orders_class = 'nav-link text-white';
    $menu_users_class = 'nav-link text-white';
    $menu_settings_class = 'nav-link text-white';
    
    if(isset($_GET['menu'])){
        if ($_GET['menu'] === 'resepsionis_panel') {
            $menu_resepsionis_panel_class = 'nav-link active text-white';
        }
    }else {
        $menu_resepsionis_panel_class = 'nav-link active text-white';
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.11.5/css/dataTables.bootstrap5.min.css">
    <title>Admin | Panel</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="../">
                <img width="40" src="../assets/images/hotel-logo.png" alt="logo-hotel">
                <span class="ms-2 fw-bold">Admin | Hotel</span>
            </a>
            <div class="" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                                <li><a class="dropdown-item" href="../auth/logout.php">log out</a></li>
                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="d-flex align-items-start">

        <div class="d-flex border-top flex-column flex-shrink-0 p-3 text-white bg-secondary"
            style="width: 280px; min-height: 95vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Menu</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="resepsionis_panel.php?menu=resepsionis_panel" class="<?= $menu_resepsionis_panel_class ?>">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Resepsionis Panel
                    </a>
                </li>
            </ul>
            <hr>
        </div>