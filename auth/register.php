<?php 

    require_once '../connection.php';

    if (!isset($_POST['register'])) {
        header('Location: ../index.php');
    }else{

        $data = array([]);

        $data['email'] = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $data['nama_lengkap'] = filter_input(INPUT_POST, "nama_lengkap", FILTER_SANITIZE_STRING);
        $data['password'] = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
        $data['conf_password'] = filter_input(INPUT_POST, "conf_password", FILTER_SANITIZE_STRING);
        
        $error = '';

        foreach ($data as $key => $dt) {
            
            if ($dt == '') {
                $error .= $key . ' tidak boleh kosong,';
            }
            
        }
        
        if (strlen($error) > 0) {
            header('Location: ../index.php?errors=' . $error);
        }else {
            if ($data['password'] !== $data['conf_password']) {
                header('Location: ../index.php?errors=password dan konfirmasi password tidak sama');
            }else{
                $password = password_hash($data['password'], PASSWORD_DEFAULT);
            }
    
            $result = $conn->query("INSERT INTO users (nama_lengkap, email, password) VALUES('" . $data['nama_lengkap'] . "', '" . $data['email'] . "', '" . $password . "')");
    
            if (strlen(mysqli_error($conn)) > 0) {
                header('Location: ../index.php?errors=error:500');
            }else{
                header('Location: ../index.php?response=berhasil mendaftar');
            }
        }

    }

?>