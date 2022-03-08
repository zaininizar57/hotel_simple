<?php  require_once 'layouts/header.php'; ?>

<?php  require_once '../connection.php'; ?>

<?php 

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

?>
<div class="container py-4 ">
    <div class="badge bg-primary d-flex justify-content-between px-4 py-2">
        <h4>Semua User</h4>
        <a href="v_tambah_kamar.php?menu=v_kamar" class="btn btn-secondary">Registrasi User</a>
    </div>
    <table class="table table-striped table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Role</th>
                <th scope="col">Email</th>
                <th scope="col">Created at</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
            <?php $no = 1; ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <th scope="row"><?= $no ?></th>
                <td><?= $row['nama_lengkap'] ?></td>
                <td>
                    <?php 

                        switch ($row['role_id']) {
                            case '1':
                                echo 'Admin';
                                break;
                            case '2':
                                echo 'Resepsionis';
                                break;
                            case '3':
                                echo 'User';
                                break;
                            default:
                                echo 'Unknow';
                                break;
                        }
                    
                    ?>
                </td>
                <td><?= $row['email'] ?></td>
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