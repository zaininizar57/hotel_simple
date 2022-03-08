<?php  require_once 'layouts/header.php'; ?>

<?php 

    require_once '../connection.php';
    $error = '';
    $resp = '';
    $filename = '';
    
    if (isset($_POST['save']) && isset($_GET['id'])) {
        $data = array([]);
        
        $data['kamar_id'] = $_GET['id'];
        $data['title'] = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
        $data['description'] = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
        $data['photo'] = '';
        
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] < 1) {
            $target_dir = "../assets/images/fasilitas_kamar/";
            $target_file = $target_dir . basename($_FILES["photo"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if(isset($_POST["save"])) {
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $error = "File is not an image.,";
                    $uploadOk = 0;
                }
            }

            
            // Check if file already exists
            if (file_exists($target_file)) {
                $error = "Sorry, file already exists.,";
                $uploadOk = 0;
            }
            
            // Check file size
            // if ($_FILES["photo"]["size"] > 1000000) {
            //     $error = "Sorry, your file is too large.,";
            //     $uploadOk = 0;
            // }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.,";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $error = "Sorry your file was not uploaded.,";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                    $resp = "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
                    $filename = htmlspecialchars( basename( $_FILES["photo"]["name"]));
                } else {
                    $error = "Sorry, there was an error uploading your file.,";
                }
            }

            $data['photo'] = $filename;
            
        }

        foreach ($data as $key => $dt) {
            
            if ($dt == '') {
                $error .= $key . ' tidak boleh kosong,';
            }
            
        }
        
        if (strlen($error) > 0) {
        }else {

            $sql = "INSERT INTO fasilitas_kamar (kamar_id, title, description, photo) VALUES('" . $data['kamar_id'] . "', '" . $data['title'] . "', '" . $data['description'] . "', '". $data['photo'] ."')";

            $result = $conn->query($sql);
            
            if (strlen(mysqli_error($conn)) > 0) {
                $error = 'Error:500';
                var_dump($sql);
                var_dump($data);
                var_dump(mysqli_error($conn));die;
            }else{
                $resp = 'Berhasil Menambah Fasilitas Umum';
            }
        }
    }

?>

<div class="container py-4 ">
    <div class="badge bg-primary d-flex justify-content-between px-4 py-2">
        <h4>Tambah Fasilitas Kamar</h4>
    </div>

    <?php if(strlen($error) > 0): ?>
    <div class="alert alert-danger">

        <?php

            $errors = $error;

            $error_messages = explode(',', $errors);

            foreach($error_messages as $err){
                echo '<div class="" style="font-size: 15px;">' . $err . '</div>';
            }

        ?>
    </div>
    <?php endif; ?>

    <?php if(strlen($resp) > 0): ?>
    <div class="alert alert-success">

        <?php
            $response = $resp;

            $response_messages = explode(',', $response);

            foreach($response_messages as $res){
                echo '<div class="" style="font-size: 15px;">' . $res . '</div>';
            }
        ?>
    </div>
    <?php endif; ?>

    <div class="card mt-3">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title">
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Photo</label>
                    <input name="photo" type="file" class="form-control" id="foto">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>
                <button name="save" type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>

<?php  require_once 'layouts/footer.php'; ?>