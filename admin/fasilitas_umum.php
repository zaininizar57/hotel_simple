<?php  require_once 'layouts/header.php'; ?>

<?php  require_once '../connection.php'; ?>

<?php 

    $sql = "SELECT * FROM fasilitas_umum";
    $result = mysqli_query($conn, $sql);

?>

<div class="container py-4 ">
    <div class="badge bg-primary d-flex justify-content-between px-4 py-2">
        <h4>Fasilitas Umum</h4>
        <a href="tambah_fasilitas_umum.php?menu=v_fasilitas_umum" class="btn btn-secondary">Tambah Fasilitas Umum</a>
    </div>

    <?php 
                    
                    if (isset($_GET['err'])) : ?>

    <div class="px-4 mt-2 py-2 rounded shadow" style="width: 100%; background-color: #ff8589;">

        <?php
            
                                $err = $_GET['err'];
            
                                $error_messages = explode(',', $err);
            
                                foreach($error_messages as $err){
                                    echo '<div class="text-white capitalize" style="font-size: 12px;">' . $err . '</div>';
                                }
            
                            ?>
    </div>

    <?php endif; ?>

    <?php 
                                
                    if (isset($_GET['res'])) : ?>

    <div class="px-4 mt-2 py-2 rounded shadow bg-success" style="width: 100%;">

        <?php
            
                                $res = $_GET['res'];
            
                                $res_messages = explode(',', $res);
            
                                foreach($res_messages as $res){
                                    echo '<div class="text-white capitalize" style="font-size: 12px;">' . $res . '</div>';
                                }
            
                            ?>
    </div>

    <?php endif; ?>

    <table class="table table-striped table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Act</th>
                <th scope="col">Nama Fasilitas</th>
                <th scope="col">Foto</th>
                <th scope="col">Deskripsi</th>
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
                        <span class="badge bg-primary dropdown-toggle" role="button" id="btn-act"
                            data-bs-toggle="dropdown">
                            Act
                        </span>
                        <ul class="dropdown-menu" id="act">
                            <li>
                                <span style="cursor: pointer;" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEdite<?= $no ?>">Edite</span>
                            </li>
                            <li><a class="dropdown-item"
                                    href="act.php?act=delete_fasilitas_umum&id=<?= $row['id'] ?>">Hapus</a></li>
                        </ul>
                    </div>
                </td>
                <!-- Start Modal -->
                <div class="modal fade" id="exampleModalEdite<?= $no ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="act.php?act=update_fasilitas_umum&id=<?= $row['id'] ?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input name="title" value="<?= $row['title'] ?>" type="text"
                                            class="form-control" id="title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Photo</label>
                                        <input name="photo" value="<?= $row['photo'] ?>" type="hidden">
                                        <img class="mb-3" width="50"
                                            src="../assets/images/fasilitas_umum/<?= $row['photo'] ?>" />
                                        <input name="new_photo" type="file" class="form-control" id="foto">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" cols="30"
                                            rows="10"><?= $row['description'] ?></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button name="update_fasilitas_umum" type="submit"
                                    class="btn btn-primary">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
                <td><?= $row['title'] ?></td>
                <td>
                    <img data-bs-toggle="modal" data-bs-target="#exampleModal<?= $no; ?>" width="30" height="30"
                        class="rounded-circle cursor-pointer"
                        src="<?= '../assets/images/fasilitas_umum/' . $row['photo'] ?>" alt="">

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
                                        src="<?= '../assets/images/fasilitas_umum/' . $row['photo'] ?>" alt="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td><?= $row['description'] ?></td>
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

<script>
var btnAct = document.querySelectorAll("#btn-act");
var act = document.querySelectorAll("#act");

btnAct.forEach((el) => {
    el.addEventListener('click', (e) => {
        el.nextElementSibling.classList.toggle('show');
    });
});
</script>

<?php  require_once 'layouts/footer.php'; ?>