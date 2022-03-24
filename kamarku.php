<?php require_once 'layouts/header.php' ?>
<?php 

    $sql = "SELECT orders.*, users.nama_lengkap, kamar.title, kamar.deskripsi, kamar.foto
            FROM orders 
            INNER JOIN users 
            ON orders.user_id = users.id
            INNER JOIN kamar 
            ON orders.kamar_id = kamar.id
            WHERE orders.user_id = " . $_SESSION['auth']['id'];
            
    $result = mysqli_query($conn, $sql);

?>
<div class="container-fluid my-4">
    <h5>Kamar PesananKu</h5>
    <hr>
    <div class="row d-flex justify-content-center">
        <?php if ($result->num_rows > 0): ?>
        <?php $no = 1; ?>
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="card p-0 me-4 mt-4" style="width: 80vw;">
            <div
                style="height: 16rem; background-size: cover; background-position: center; background-image: url('<?= 'assets/images/kamar/' . $row['foto'] ?>')">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $row['title'] ?></h5>
                <p class="card-text">Ket Kamar: <?= $row['deskripsi'] ?></p>
                <p class="card-text">Nama Tamu: <?= $row['nama_lengkap'] ?></p>
                <p class="card-text">Tanggal Check in: <span class="badge bg-secondary"><?= $row['check_in'] ?></span>
                </p>
                <p class="card-text">Tanggal Check out: <span class="badge bg-secondary"><?= $row['check_out'] ?></span>
                </p>
                <p class="card-text">Jumlah Hari: <?= $row['day_total'] ?></p>
                <p class="card-text">Jumlah Kamar: <?= $row['jumlah_kamar'] ?></p>
                <p class="card-text">Total Harga: RP<?= $row['price_total'] ?></p>
                <?php if($row['payed_status']): ?>
                <p class="card-text">
                <div class="badge bg-success">Telah di Bayar</div>
                </p>
                <?php else: ?>
                <p class="card-text">
                <div class="badge bg-warning">Belum di Bayar</div>
                </p>
                <?php endif; ?>
                <a href="resepsionis/act.php?act=cetak&id=<?= $row['id'] ?>" class="px-4 btn btn-primary">Cetak</a>
            </div>
        </div>
        <?php $no++; ?>
        <?php endwhile; ?>
        <?php else: ?>
        <h1>Data Kosong</h1>
        <?php endif; ?>

        <?php $conn->close(); ?>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>

<?php require_once 'layouts/footer.php' ?>

</body>

</html>