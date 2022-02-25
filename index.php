<?php 

    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <title>Hotel</title>
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
                <span class="fw-bold">Hotel</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cari Hotel</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Contact</a>
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
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img style="max-height: 90vh !important;" src="assets/images/edvin-johansson-rlwE8f8anOc-unsplash.jpg"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Fasilitas</h5>
                    <p>Fasilitas yang lengkap, tersedia kolam renang</p>
                </div>
            </div>
            <div class="carousel-item">
                <img style="max-height: 90vh !important;" src="assets/images/egor-myznik-zi7RndSr1Cw-unsplash.jpg"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Kamar yang nyaman</h5>
                    <p>Suasana dalam kamar yang sangat nyaman</p>
                </div>
            </div>
            <div class="carousel-item">
                <img style="max-height: 90vh !important;" src="assets/images/marten-bjork-n_IKQDCyrG0-unsplash.jpg"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Malam Indah</h5>
                    <p>Pemandangan malam yang sangat indah</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    <br>
    <br>

    <div class="row my-4 d-flex mx-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title text-center my-4">Cari kamar yang kamu inginkan</h5>
                <form action="" method="get" class="input-group mb-3 px-4">
                    <input type="text" class="form-control" aria-label="Text input with dropdown button">
                    <button class="btn btn-secondary text-white px-4" type="button">Cari</button>
                </form>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>

    <div class="container-fluid">
        <h5>Recomended</h5>
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="card p-0 me-4 mt-4" style="width: 24rem;">
                <img src="assets/images/ralph-ravi-kayden-FqqiAvJejto-unsplash (1).jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card me-4 p-0 mt-4" style="width: 24rem;">
                <img src="assets/images/ralph-ravi-kayden-FqqiAvJejto-unsplash (1).jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card me-4 p-0 mt-4" style="width: 24rem;">
                <img src="assets/images/ralph-ravi-kayden-FqqiAvJejto-unsplash (1).jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card me-4 p-0 mt-4" style="width: 24rem;">
                <img src="assets/images/ralph-ravi-kayden-FqqiAvJejto-unsplash (1).jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    <footer class="bg-dark text-white">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center py-4">
                        <img width="40" src="assets/images/hotel-logo.png" alt="logo-hotel">
                        <span class="ms-3 fw-bold fs-4">Hotel</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex optio dolor nesciunt accusantium
                        ipsum sapiente temporibus necessitatibus quidem atque reiciendis.</p>
                </div>
                <div class="col-md-2">
                    <ul class="nav flex-column py-4">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Help</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 py-4">
                    <div style="width: 100%"><iframe width="100%" height="200" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=smkn%201%20rao%20selatan+(hotel)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                                href="https://www.gps.ie/truck-gps/">fleet tracking gps</a></iframe></div>
                </div>
            </div>
        </div>
    </footer>

    <div class="container-modal-register" id="modal-register">
        <?php 
                    
            if (isset($_GET['errors'])) {
                ?>

        <div class="px-4 py-2 rounded shadow" style="width: 32rem; background-color: #ff8589;">

            <?php
                    $errors = $_GET['errors'];

                    $error_messages = explode(',', $errors);

                    foreach($error_messages as $err){
                        echo '<div class="text-white capitalize" style="font-size: 12px;">' . $err . '</div>';
                    }

                    echo '<script>
                            isOpenModalRegister = true;
                        </script>';

                    ?>
        </div>

        <?php

                }
            
            ?>
        <div class="modal-register card">
            <div class="card-header d-flex align-items-center justify-content-between px-4 py-2">
                <span class="fs-5">Registrasi</span>
                <svg id="btn-close-x" style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                </svg>
            </div>
            <div class="card-body px-4">
                <form action="auth/register.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                        <input name="nama_lengkap" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Konfirmasi
                            Password</label>
                        <input name="conf_password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="flex align-items-center py-2">
                        <!-- <div id="btn-modal-close" class="btn btn-secondary px-4">Close</div> -->
                        <button name="register" type="submit" class="btn btn-primary px-4">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container-modal-login" id="modal-login">
        <?php  if (isset($_GET['response'])) : ?>

            <div class="alert alert-success" style="width: 32rem;">
                <?php

                    $response = $_GET['response'];
                    
                    echo '<div class="capitalize" style="font-size: 12px;">' . $response . '</div>';

                    echo '<script>
                            isOpenModalLogin = true;
                        </script>';

                ?>
            </div>

        <?php endif; ?>

        <?php  if (isset($_GET['error_login'])) : ?>

            <div class="px-4 py-2 rounded shadow" style="width: 32rem; background-color: #ff8589;">

                <?php
                
                    $error_login = $_GET['error_login'];

                    $error_messages_login = explode(',', $error_login);
                
                    foreach($error_messages_login as $err_log){
                        echo '<div class="text-white" style="font-size: 12px;">' . $err_log . '</div>';
                    }

                    echo '<script>
                            isOpenModalLogin = true;
                        </script>';

                ?>
            </div>

        <?php endif; ?>
        <div class="modal-login card" style="height: 24rem !important;">
            <div class="card-header d-flex align-items-center justify-content-between px-4 py-2">
                <span class="fs-5">Login</span>
                <svg id="btn-close-login-x" class="cursor-pointer" style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                </svg>
            </div>
            <div class="card-body px-4 d-flex flex-column border justify-content-center">
                <form class="d-flex flex-column" action="auth/login.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="flex align-items-center py-2">
                        <!-- <div id="btn-modal-close-login" class="btn btn-secondary px-4">Close</div> -->
                        <button name="login" type="submit" class="btn btn-primary px-4">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', () => {

        if (isOpenModalRegister) {
            document.getElementById("btn-modal-register").click();
        }

        if (isOpenModalLogin) {
            document.getElementById("btn-modal-login").click();
        }

    });
    </script>

</body>

</html>