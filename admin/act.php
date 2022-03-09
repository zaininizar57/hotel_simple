<?php 

    require_once '../connection.php';

    if (isset($_GET['act']) && isset($_GET['id'])) {
        if ($_GET['act'] == 'update_kamar' && isset($_POST['update_kamar'])) {
            $error = '';
            $resp = '';
            $filename = '';
            
            $data = array([]);
    
            
            $data['title'] = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
            $data['price'] = filter_input(INPUT_POST, "price", FILTER_SANITIZE_STRING);
            $data['description'] = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
            $data['photo'] = filter_input(INPUT_POST, "photo", FILTER_SANITIZE_STRING);
            
            if (isset($_FILES['new_photo']) && $_FILES['new_photo']['error'] < 1 ) {
                $target_dir = "../assets/images/kamar/";
                $target_file = $target_dir . basename($_FILES["new_photo"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
                // Check if image file is a actual image or fake image
                if(isset($_POST["update_kamar"])) {
                    $check = getimagesize($_FILES["new_photo"]["tmp_name"]);
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
                if ($_FILES["new_photo"]["size"] > 1000000) {
                $error = "Sorry, your file is too large.,";
                $uploadOk = 0;
                }
    
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
                if (move_uploaded_file($_FILES["new_photo"]["tmp_name"], $target_file)) {
                    $resp = "The file ". htmlspecialchars( basename( $_FILES["new_photo"]["name"])). " has been uploaded.";
                    $filename = htmlspecialchars( basename( $_FILES["new_photo"]["name"]));
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
                header('Location: v_kamar.php?err=' . $error);
            }else {
                
                // var_dump($data);die;

                $sql = "UPDATE kamar
                        SET 
                            title = '" . $data['title'] . "', 
                            price = " . $data['price'] . ", 
                            foto = '" . $data['photo'] . "', 
                            deskripsi = '". $data['description'] ."' 
                        WHERE id = " . $_GET['id'];

                $result = $conn->query($sql);

                if (strlen(mysqli_error($conn)) > 0) {
                    $error = 'Error:500';
                    header('Location: v_kamar.php?err=' . $error);
                }else{
                    $response = 'Data Berhasil di Update';
                    header('Location: v_kamar.php?res=' . $response);
                }
            }

        }else if ($_GET['act'] == 'delete') {
            
            $sql = "DELETE FROM kamar WHERE id = " . $_GET['id'];

            $result = $conn->query($sql);

            if ($result) {
                header('Location: v_kamar.php?res=success');
            }
 
        } else if ($_GET['act'] == 'update_fasilitas_umum' && isset($_POST['update_fasilitas_umum'])) {
            $error = '';
            $resp = '';
            $filename = '';
            
            $data = array([]);
    
            
            $data['title'] = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
            $data['description'] = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
            $data['photo'] = filter_input(INPUT_POST, "photo", FILTER_SANITIZE_STRING);
            
            if (isset($_FILES['new_photo']) && $_FILES['new_photo']['error'] < 1 ) {
                $target_dir = "../assets/images/fasilitas_umum/";
                $target_file = $target_dir . basename($_FILES["new_photo"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
                // Check if image file is a actual image or fake image
                if(isset($_POST["update_fasilitas_umum"])) {
                    $check = getimagesize($_FILES["new_photo"]["tmp_name"]);
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
                // if ($_FILES["new_photo"]["size"] > 1000000) {
                // $error = "Sorry, your file is too large.,";
                // $uploadOk = 0;
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
                if (move_uploaded_file($_FILES["new_photo"]["tmp_name"], $target_file)) {
                    $resp = "The file ". htmlspecialchars( basename( $_FILES["new_photo"]["name"])). " has been uploaded.";
                    $filename = htmlspecialchars( basename( $_FILES["new_photo"]["name"]));
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
                header('Location: fasilitas_umum.php?menu=v_fasilitas_umum&err=' . $error);
            }else {
                
                // var_dump($data);die;

                $sql = "UPDATE fasilitas_umum
                        SET 
                            title = '" . $data['title'] . "', 
                            description = '". $data['description'] ."', 
                            photo = '" . $data['photo'] . "' 
                        WHERE id = " . $_GET['id'];

                $result = $conn->query($sql);

                if (strlen(mysqli_error($conn)) > 0) {
                    $error = 'Error:500';
                    header('Location: fasilitas_umum.php?menu=v_fasilitas_umum&err=' . $error);
                }else{
                    $response = 'Data Berhasil di Update';
                    header('Location: fasilitas_umum.php?menu=v_fasilitas_umum&res=' . $response);
                }
            }

        }else if ($_GET['act'] == 'delete_fasilitas_umum') {
            
            $sql = "DELETE FROM fasilitas_umum WHERE id = " . $_GET['id'];

            $result = $conn->query($sql);

            if ($result) {
                header('Location: fasilitas_umum.php?res=success');
            }
 
        }else if ($_GET['act'] == 'delete_fasilitas_kamar') {
            
            $sql = "DELETE FROM fasilitas_kamar WHERE id = " . $_GET['id'];

            $result = $conn->query($sql);
            
            if ($result) {
                header('Location: fasilitas_kamar.php?menu=v_kamar&id=' . $_GET['kamar_id'] . '&res=success');
            }
 
        }else if ($_GET['act'] == 'update_fasilitas_kamar' && isset($_POST['update_fasilitas_kamar'])) {
            $error = '';
            $resp = '';
            $filename = '';
            
            $data = array([]);
    
            
            $data['title'] = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
            $data['description'] = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
            $data['photo'] = filter_input(INPUT_POST, "photo", FILTER_SANITIZE_STRING);
            
            if (isset($_FILES['new_photo']) && $_FILES['new_photo']['error'] < 1 ) {
                $target_dir = "../assets/images/fasilitas_kamar/";
                $target_file = $target_dir . basename($_FILES["new_photo"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
                // Check if image file is a actual image or fake image
                if(isset($_POST["update_fasilitas_kamar"])) {
                    $check = getimagesize($_FILES["new_photo"]["tmp_name"]);
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
                // if ($_FILES["new_photo"]["size"] > 1000000) {
                // $error = "Sorry, your file is too large.,";
                // $uploadOk = 0;
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
                if (move_uploaded_file($_FILES["new_photo"]["tmp_name"], $target_file)) {
                    $resp = "The file ". htmlspecialchars( basename( $_FILES["new_photo"]["name"])). " has been uploaded.";
                    $filename = htmlspecialchars( basename( $_FILES["new_photo"]["name"]));
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
                header('Location: fasilitas_kamar.php?id='. $_GET['kamar_id'] .'&menu=v_kamar&err=' . $error);
            }else {
                
                // var_dump($data);die;

                $sql = "UPDATE fasilitas_kamar
                        SET 
                            title = '" . $data['title'] . "', 
                            description = '". $data['description'] ."', 
                            photo = '" . $data['photo'] . "' 
                        WHERE id = " . $_GET['id'];

                $result = $conn->query($sql);

                if (strlen(mysqli_error($conn)) > 0) {
                    $error = 'Error:500';
                    header('Location: fasilitas_kamar.php?id='. $_GET['kamar_id'] .'&menu=v_kamar&err=' . $error);
                }else{
                    $response = 'Data Berhasil di Update';
                    header('Location: fasilitas_kamar.php?id='. $_GET['kamar_id'] .'&menu=v_kamar&res=' . $response);
                }
            }

        }if ($_GET['act'] == 'set_payed') {
            $sql = "UPDATE orders SET payed_status = '" . 1 . "' WHERE id = " . $_GET['id'];
 
            $result = $conn->query($sql);
 
            if ($result) {
                header('Location: orders.php?resp=success&menu=v_orders');
            }
 
         }else if ($_GET['act'] == 'set_check_out') {
             
             $sql = "UPDATE orders SET check_out = '" . date('Y-m-d H:i:s') . "' WHERE id = " . $_GET['id'];
 
             $result = $conn->query($sql);
 
             if ($result) {
                 header('Location: orders.php?resp=success&menu=v_orders');
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