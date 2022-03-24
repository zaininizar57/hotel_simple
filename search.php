<?php
    if (isset($_POST['search'])) {
        require_once 'connection.php';

        $no = 1;
        $search = $_POST['search'];

        $query = mysqli_query($conn, "SELECT * FROM kamar WHERE title LIKE '%" . $search . "%'");
        while ($row = mysqli_fetch_object($query)) {
?>
<div class="card p-0 me-4 mt-4" style="width: 24rem;">
    <div
        style="height: 16rem; background-size: cover; background-image: url('<?= 'assets/images/kamar/' . $row->foto ?>')">
    </div>
    <div class="card-body">
        <h5 class="card-title"><?= $row->title ?></h5>
        <p class="card-text"><?= substr($row->deskripsi, 0, 40) . '....' ?><a href="#">More</a></p>
        <a href="order.php?kamar_id=<?= $row->id ?>" class="px-4 btn btn-primary">Order</a>
    </div>
</div>
<?php 
        }
    } 
?>