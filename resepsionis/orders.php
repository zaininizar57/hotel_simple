<?php  require_once '../connection.php'; ?>

<?php 

    if (empty($_SESSION['auth'])) {
        header('Location: auth/login.php');
    }else if($_SESSION['auth']['role_id'] !== '2'){
        header('Location: auth/login.php');
    }

    $sql = "SELECT orders.*, users.nama_lengkap, kamar.title
            FROM ((orders
            INNER JOIN users ON orders.user_id = users.id)
            INNER JOIN kamar ON orders.kamar_id = kamar.id);";
            
    $result = mysqli_query($conn, $sql);

?>
<div class="container py-4 ">

    <?php if (isset($_GET['resp'])) : ?>
    <?php 
        $resp = $_GET['resp'];
    ?>
    <script>
    Swal.fire({
        title: 'Success!',
        text: '<?= $resp ?>',
        icon: 'success',
        confirmButtonText: 'Ok'
    })
    </script>
    <?php endif; ?>


    <div class="badge bg-primary d-flex justify-content-between px-4 py-2">
        <h4>Semua Order</h4>
    </div>
    <br>
    <table class="table table-striped table-hover mt-4" id="tamuTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Act</th>
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
                <td>
                    <div class="dropdown">
                        <div class="badge bg-primary dropdown-toggle" type="button" id="btn-act">
                            act
                        </div>
                        <ul class="dropdown-menu" id="act">
                            <li><a class="dropdown-item" href="act.php?act=set_payed&id=<?= $row['id'] ?> ">Set
                                    Payed</a></li>
                            <li><a class="dropdown-item" href="act.php?act=set_check_out&id=<?= $row['id'] ?> ">Set
                                    CheckOut</a></li>
                            <li><a class="dropdown-item" href="act.php?act=cetak&id=<?= $row['id'] ?> ">Print</a></li>
                            <li><span style="cursor: pointer;" class="dropdown-item"
                                    onclick="alertConfirm()">Delete</span></li>
                        </ul>
                    </div>
                </td>
                <td><?= $row['nama_lengkap'] ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['day_total'] ?></td>
                <td><?= $row['price_total'] ?></td>
                <script>
                const alertConfirm = () => {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = 'act.php?act=delete&id=<?= $row['id'] ?>';

                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    })
                }
                </script>
                <td>
                    <?php if($row['payed_status']): ?>
                    <span class="badge bg-success">Payed</span>
                    <?php else: ?>
                    <span class="badge bg-warning">Proccess</span>
                    <?php endif; ?>
                </td>
                <td><?= $row['check_in'] ?></td>
                <td>
                    <?php if($row['check_out'] == ''): ?>
                    <span class="badge bg-warning">none</span>
                    <?php else: ?>
                    <?= $row['check_out'] ?>
                    <?php endif; ?>
                </td>
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