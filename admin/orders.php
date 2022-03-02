<?php  require_once 'layouts/header.php'; ?>

<?php  require_once '../connection.php'; ?>

<?php 

    $sql = "SELECT * FROM orders.*, users.nama_lengkap INNER JOIN users ON orders.user_id = users.id";
    $result = mysqli_query($conn, $sql);

?>
<div class="container py-4 ">
    <div class="badge bg-primary d-flex justify-content-between px-4 py-2">
        <h4>Semua Order</h4>
    </div>
    <table class="table table-striped table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Tamu</th>
                <th scope="col">Nama Kamar</th>
                <th scope="col">Jumlah Hari</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Payed</th>
                <th scope="col">Check in</th>
                <th scope="col">Check out</th>
                <th scope="col">Created at</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
            <?php $no = 1; ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <th scope="row"><?= $no ?></th>
                <td><?= $row['user_id'] ?></td>
                <td><?= $row['kamar_id'] ?></td>
                <td><?= $row['day_total'] ?></td>
                <td><?= $row['price_total'] ?></td>
                <td><?= $row['payed_status'] ?></td>
                <td><?= $row['check_in'] ?></td>
                <td><?= $row['check_out'] ?></td>
                <td><?= $row['created_at'] ?></td>
            </tr>
            <?php $no++; ?>
            <?php endwhile; ?>
            <?php else: ?>
            <h1>Data Kosong</h1>
            <?php endif; ?>

            <?php $conn->close(); ?>
        </tbody>
    </table>
</div>

<?php  require_once 'layouts/footer.php'; ?>

<?php  require_once 'layouts/footer.php'; ?>