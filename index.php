<?php require_once 'layouts/header.php' ?>

<?php 

    $sql = "SELECT * FROM kamar";
    $result = mysqli_query($conn, $sql);

    $sql_fasilitas = "SELECT * FROM fasilitas_umum";
    $result_fasilitas = mysqli_query($conn, $sql_fasilitas);

    $fasilitas_count = $result_fasilitas->num_rows;

?>



<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php for($i = 0; $i <= $fasilitas_count; $i++): ?>
        <?php if($i == 0): ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i ?>" class="active"
            aria-current="true" aria-label="Slide <?= $i ?>"></button>
        <?php else: ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i ?>" aria-current="true"
            aria-label="Slide <?= $i ?>"></button>
        <?php endif; ?>
        <?php endfor; ?>
    </div>
    <div class="carousel-inner">
        <?php 

            $sql_fasilitas = "SELECT * FROM fasilitas_umum";
            $result_fasilitas = mysqli_query($conn, $sql_fasilitas);

            $i = 0;
            while($fasilitas = $result_fasilitas->fetch_assoc()) :

        ?>

        <?php if($i == 0): ?>
        <div class="carousel-item active">
            <div
                style="background-image: url(<?= 'assets/images/fasilitas_umum/' . $fasilitas['photo'] ?>); background-position: center; background-size: cover; height: 80vh; width: 100vw;">
            </div>

            <div class="carousel-caption d-none d-md-block">
                <h5><?= $fasilitas['title'] ?></h5>
                <p><?= $fasilitas['description'] ?></p>
            </div>
        </div>
        <?php else: ?>
        <div class="carousel-item">
            <div
                style="background-image: url(<?= 'assets/images/fasilitas_umum/' . $fasilitas['photo'] ?>); background-position: center; background-size: cover; height: 80vh; width: 100vw;">
            </div>

            <div class="carousel-caption d-none d-md-block">
                <h5><?= $fasilitas['title'] ?></h5>
                <p><?= $fasilitas['description'] ?></p>
            </div>
        </div>
        <?php endif; ?>

        <?php 
            $i++;
            endwhile;
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<br>
<br>
<br>

<div class="container">
    <div class="row my-4 d-flex mx-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title text-center my-4">Cari kamar yang kamu inginkan</h5>
                <form action="" method="get" class="input-group mb-3 px-4">
                    <input id="search" type="text" class="form-control" aria-label="Text input with dropdown button">
                    <button class="btn btn-secondary text-white px-4" type="button">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>

<div class="container">
    <h5>Rekomendasi Kamar</h5>
    <hr>
    <div id="tampil" class="row d-flex justify-content-center">
        <?php if ($result->num_rows > 0): ?>
        <?php $no = 1; ?>
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="card p-0 me-4 mt-4" style="width: 24rem;">
            <div
                style="height: 16rem; background-size: cover; background-image: url('<?= 'assets/images/kamar/' . $row['foto'] ?>')">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $row['title'] ?></h5>
                <p class="card-text"><?= substr($row['deskripsi'], 0, 40) . '....' ?><a href="#">More</a></p>
                <a href="order.php?kamar_id=<?= $row['id'] ?>" class="px-4 btn btn-primary">Order</a>
            </div>
        </div>
        <?php $no++; ?>
        <?php endwhile; ?>
        <?php else: ?>
        <h1>Data Kosong</h1>
        <?php endif; ?>

    </div>
</div>

<br>
<br>
<br>
<br>
<br>


<?php 

    $sql = "SELECT * FROM fasilitas_umum";
    $result = mysqli_query($conn, $sql);

?>

<div class="container">
    <h5>Fasilitas Umum</h5>
    <hr>
    <div style="cursor: pointer;" class="slider-fasilitas-umum">
        <?php if ($result->num_rows > 0): ?>
        <?php $no = 1; ?>
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="mx-4 card" style="width: 18rem;">
            <div onclick="showImage('assets/images/fasilitas_umum/<?= $row['photo'] ?>')"
                style="height: 16rem; background-size: cover; background-image: url(assets/images/fasilitas_umum/<?= $row['photo'] ?>)">
            </div>
            <div class="card-body">
                <h6 class="card-title"><?= $row['title'] ?></h6>
                <p class="card-text"><?= substr($row['description'], 0, 60) . '....' ?></p>
            </div>
        </div>



        <?php $no++; ?>
        <?php endwhile; ?>
        <?php else: ?>
        <h1>Data Kosong</h1>
        <?php endif; ?>
    </div>
</div>


<script>
const showImage = (url) => {
    Swal.fire({
        imageUrl: url,
        imageHeight: 500,
        imageWidth: 500,
    })
}
</script>


<br>
<br>
<br>
<br>
<br>

<?php require_once 'layouts/footer.php' ?>

<div class="container-modal-register" id="modal-register">
    <?php if (isset($_GET['errors'])) { ?>
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
    <?php } ?>
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
<script type="module">
import {
    tns
} from "./node_modules/tiny-slider/src/tiny-slider.js";

var slider = tns({
    "container": '.slider-fasilitas-umum',
    "items": 3,
    "mouseDrag": true,
    "slideBy": "page",
    "swipeAngle": false,
    "speed": 400,
    "loop": true,
    "nav": false,
    "controls": false,

});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#search').on('keyup', function() {
        $.ajax({
            type: 'POST',
            url: 'search.php',
            data: {
                search: $(this).val()
            },
            cache: false,
            success: function(data) {
                $('#tampil').html(data);
            }
        });
    });
});
</script>

</body>

</html>