<?php require_once 'layouts/header.php' ?>

<?php 

    if (empty($_SESSION['auth'])) {
        header('Location: auth/login.php');
    }

    if (isset($_GET['kamar_id'])) {
        $id = $_GET['kamar_id'];

        $sql = "SELECT * FROM kamar WHERE id = " . $id;
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();

        if (isset($_POST['check_in'])) {

            if (isset($_POST['jumlah_hari']) && $_POST['jumlah_hari'] !== '') {
                
                $user_id = $_SESSION['auth']['id'];
                $kamar_id = $_GET['kamar_id'];
                $day_total = $_POST['jumlah_hari'];
                $price_total = $_POST['jumlah_hari'] * $data['price'];
                $check_in = date('Y-m-d H:i:s');
                $sql = "INSERT INTO orders (
                    user_id,
                    kamar_id,
                    day_total,
                    price_total,
                    check_in
                ) VALUES (
                    '" . $user_id . "',
                    '" . $kamar_id . "',
                    '" . $day_total . "',
                    '" . $price_total . "',
                    '" . $check_in . "'
                )";

                $result = $conn->query($sql);
                if ($result) {
                    $succ = "Berhasil Memesan Kamar";
                }else {
                    $err = "Gagal";
                }
    
            }else {
                $err = 'Jumlah hari harus tidak boleh kosong';
            }
    
        }

    ?>

<div class="container-fluid py-4 my-4">
    <div class="d-flex justify-content-center flex-column align-items-center">
        <div class="card p-0 me-4 mt-4">
            <div
                style="height: 50vh; width: 50vw; background-size: cover; background-image: url('<?= 'assets/images/kamar/' . $data['foto'] ?>')">
            </div>
            <?php  if (isset($err)): ?>
            <br>
            <div class="alert alert-danger" style="width: 100%;">
                <?= $err ?>
                <?= "<script>
                    Swal.fire({
                        title: 'Gagal!',
                        text: '". $err ."',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                      })
                </script>"; ?>
            </div>
            <?php  endif; ?>
            <?php  if (isset($succ)): ?>
            <br>
            <div class="alert alert-success" style="width: 100%;">
                <?= $succ ?>
                <?= "<script>
                    Swal.fire({
                        title: 'Success!',
                        text: '". $succ ."',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                      })
                </script>"; ?>
            </div>
            <?php  endif; ?>
            <div class="card-body">
                <div class="text-center">
                    <h5 class="card-title"><?= $data['title'] ?></h5>
                    <p class="card-text"><?= $data['deskripsi'] ?></p>
                    <p class="card-text">RP<?= $data['price'] ?>/Malam</p>
                </div>
                <br>
                <br>
                <form action="" method="post" class="d-flex justify-content-center align-items-center flex-column">
                    <div class="mb-3 text-center">
                        <label for="exampleInputEmail1" class="form-label">Jumlah Hari</label>
                        <input name="jumlah_hari" type="number" class="form-control">
                    </div>
                    <button name="check_in" type="submit" class="btn btn-primary">Check In</button>
                </form>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>


<?php
    }
?>

<?php require_once 'layouts/footer.php' ?>