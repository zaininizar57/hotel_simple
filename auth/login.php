<?php 

    require_once '../connection.php';

    if (!isset($_POST['login'])) {
        header('Location: ../index.php');
    }else{

        $data = array([]);

        $data['email'] = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $data['password'] = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
        
        $error = '';

        foreach ($data as $key => $dt) {
            
            if ($dt == '') {
                $error .= $key . ' tidak boleh kosong,';
            }
            
        }
        
        if (strlen($error) > 0) {
            header('Location: ../index.php?error_login=' . $error);
        }else {
            
            $sql = "SELECT * FROM users WHERE email = '" . $data['email'] . "'";
            $result = $conn->query($sql);
            if (strlen(mysqli_error($conn)) > 0) {
                header('Location: ../index.php?error_login=error:500');
            }else if(mysqli_num_rows($result) < 1){
                header('Location: ../index.php?error_login=email belum terdaftar');
            }else{

                $result = $result->fetch_assoc();

                $password = $result['password'];

                if (password_verify($data['password'], $password)) {
                    session_start();
                    $_SESSION['auth'] = $result;
                    // var_dump($_SESSION['auth']['nama_lengkap']);
                    header('Location: ../index.php');
                }

            }

        }

    }

?>