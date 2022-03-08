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
 
        }
    }

?>