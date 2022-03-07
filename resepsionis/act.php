<?php 

    require_once '../connection.php';

    if (isset($_GET['act']) && isset($_GET['id'])) {
        if ($_GET['act'] == 'set_payed') {
           $sql = "UPDATE orders SET payed_status = '" . 1 . "' WHERE id = " . $_GET['id'];

           $result = $conn->query($sql);

           if ($result) {
               header('Location: resepsionis_panel.php?resp=success');
           }

        }else if ($_GET['act'] == 'set_check_out') {
            
            $sql = "UPDATE orders SET check_out = '" . date('Y-m-d H:i:s') . "' WHERE id = " . $_GET['id'];

            $result = $conn->query($sql);

            if ($result) {
                header('Location: resepsionis_panel.php?resp=success');
            }
 
        }else if ($_GET['act'] == 'delete') {
            
            $sql = "DELETE FROM orders WHERE id = " . $_GET['id'];

            $result = $conn->query($sql);

            if ($result) {
                header('Location: resepsionis_panel.php?resp=success');
            }
 
        }else if ($_GET['act'] == 'cetak') {

            $sql = "SELECT orders.*, users.nama_lengkap, kamar.*
                    FROM orders 
                    JOIN users 
                    ON orders.user_id = users.id
                    JOIN kamar 
                    ON orders.kamar_id = kamar.id
                    WHERE orders.id = " . $_GET['id'];

            $result = $conn->query($sql);

            if ($result) : ?>

                <?php 

                    $data = $result->fetch_assoc();

                ?>

                <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
                        <link rel="stylesheet" href="../assets/DataTables/DataTables-1.11.5/css/dataTables.bootstrap5.min.css">
                        <title>Cetak</title>
                    </head>
                    <body onload="print()">
                        <div class="card text-center">
                        <h5 class="card-header">Bukti Pemesanan Kamar</h5>
                            <div class="card-body">
                                <h5 class="card-title"><?= $data['title'] ?></h5>
                                <img src="../assets/images/kamar/<?= $data['foto'] ?>" alt="">
                                <p class="card-text">Ket Kamar: <?= $data['deskripsi'] ?></p>
                                <p class="card-text">Nama Tamu: <?= $data['nama_lengkap'] ?></p>
                                <p class="card-text">Tanggal Check in: <?= $data['check_in'] ?></p>
                                <p class="card-text">Jumlah Hari: <?= $data['day_total'] ?></p>
                                <p class="card-text">Jumlah Kamar: <?= $data['jumlah_kamar'] ?></p>
                                <p class="card-text">Total Harga: RP<?= $data['price_total'] ?></p>
                            </div>
                        </div>
                    </body>
                </html>

            <?php endif;
        }
    }

?>