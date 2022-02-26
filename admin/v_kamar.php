<?php  require_once 'layouts/header.php'; ?>
<?php  require_once '../connection.php'; ?>

<?php 

    $sql = "SELECT * FROM kamar";
    $result = mysqli_query($conn, $sql);

?>
<div class="container py-4 ">
    <div class="badge bg-primary d-flex justify-content-between px-4 py-2">
        <h4>Semua Kamar</h4>
        <a href="v_tambah_kamar.php?menu=v_kamar" class="btn btn-secondary">Tambah Kamar</a>
    </div>
    <table class="table table-striped table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Foto</th>
                <th scope="col">Created at</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
            <?php $no = 1; ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <th scope="row"><?= $no ?></th>
                <td><?= $row['title'] ?></td>
                <td><?= $row['price'] ?></td>
                <td>
                    <img data-bs-toggle="modal" data-bs-target="#exampleModal<?= $no; ?>" width="30" height="30"
                        class="rounded-circle cursor-pointer" src="<?= '../assets/images/kamar/' . $row['foto'] ?>"
                        alt="">

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?= $no; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img width="400" class="rounded cursor-pointer"
                                        src="<?= '../assets/images/kamar/' . $row['foto'] ?>" alt="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td><?= $row['deskripsi'] ?></td>
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